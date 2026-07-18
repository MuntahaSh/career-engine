<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Notifications\AddProfilePhotoNotification;
use App\Services\NotificationService;



class DashboardController extends Controller
{

   public function __construct(
        private NotificationService $notificationService
    ) {
    }
    public function index()
    {
        $user = Auth::user();
        //for photo notification
        $this->notificationService->checkProfilePhotoNotifications($user);
        //for profile completion notification
        $this->notificationService->checkProfileCompletion($user);

        // -----------------------------
        // 📊 STATS SECTION
        // -----------------------------
        $stats = [
            'active_projects' => $user->projects()->count(),

            'projects_this_month' => $user->projects()
                ->whereMonth('created_at', now()->month)
                ->count(),

            'total_certificates' => $user->certificates()->count(),

            'certificates_pending' => $user->certificates()
                ->whereNull('file_path')
                ->count(),

            'verified_skills' => $user->skills()->count(),

            'years_experience' => $user->experiences()
                  ->get()
    ->sum(function ($exp) {
        $start = \Carbon\Carbon::parse($exp->start_date);

        $end = $exp->currently_working
            ? now()
            : \Carbon\Carbon::parse($exp->end_date);

        return $start->diffInMonths($end) / 12;
    }),
        ];

        // -----------------------------
        // 📈 PROFILE COMPLETION
        // -----------------------------
        $profile_completion = $this->calculateProfile($user);

        // -----------------------------
        // 🤖 AI INSIGHTS (STATIC FOR NOW)
        // -----------------------------
        $insights = [
            'message' =>
                'Our AI analyzed your profile. Adding more backend + DevOps skills can increase your job match rate.',
        ];

        // -----------------------------
        // 🕒 RECENT ACTIVITIES
        // -----------------------------
        $activities = $this->getRecentActivities($user);

        // -----------------------------
        // ⭐ FEATURED PROJECT
        // -----------------------------
        $featured_project = $user->projects()
            ->latest()
            ->first();

        if (!$featured_project) {
            $featured_project = (object)[
                'title' => 'No Project Yet',
                'description' => 'Start building your first project to showcase here.',
                'tags' => 'Laravel,PHP',
                'thumbnail' => null,
                'demo_url' => '#',
            ];
        }
        $notifications = $user->unreadNotifications;

        return view('dashboard', compact(
            'stats',
            'profile_completion',
            'insights',
            'activities',
            'featured_project'
        ));
    }

    // -----------------------------
    // 📊 PROFILE COMPLETION LOGIC
    // -----------------------------
    private function calculateProfile($user)
    {
        $fields = [
            !empty($user->name),
            !empty($user->email),
            !empty($user->bio),
            !empty($user->profile_photo_url),
            !empty($user->location),
            !empty($user->phone),
            !empty($user->website),
        ];

        $profile_score = (array_sum($fields) / count($fields)) * 50;

        $portfolio_score =
            ($user->projects()->exists() ? 12.5 : 0) +
            ($user->skills()->exists() ? 12.5 : 0) +
            ($user->experiences()->exists() ? 12.5 : 0) +
            ($user->certificates()->exists() ? 12.5 : 0);

        return min(100, round($profile_score + $portfolio_score));
    }

    // -----------------------------
    // 🕒 RECENT ACTIVITIES
    // -----------------------------
    private function getRecentActivities($user, $limit = 3)
    {
        $activities = collect();

        // Projects
        $activities = $activities->merge(
            $user->projects()
                ->latest()
                ->take(1)
                ->get()
                ->map(fn($p) => [
                    'type' => 'project',
                    'title' => "Updated {$p->title}",
                    'time' => $p->updated_at->diffForHumans(),
                ])
        );

        // Certificates
        $activities = $activities->merge(
            $user->certificates()
                ->latest()
                ->take(1)
                ->get()
                ->map(fn($c) => [
                    'type' => 'certificate',
                    'title' => "Added {$c->name}",
                    'time' => $c->created_at->diffForHumans(),
                ])
        );

        // Skills
        $activities = $activities->merge(
            $user->skills()
                ->latest()
                ->take(1)
                ->get()
                ->map(fn($s) => [
                    'type' => 'skill',
                    'title' => "Added skill {$s->name}",
                    'time' => $s->created_at->diffForHumans(),
                ])
        );

        return $activities
            ->sortByDesc('time')
            ->take($limit)
            ->values()
            ->toArray();
    }
}
