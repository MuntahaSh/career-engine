<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $user;
    public $stats;
    public $profileCompletion;
    public $insights;
    public $activities;
    public $featuredProject;

    public function __construct()
    {
        $this->user = Auth::user();

        $this->stats = $this->buildStats();
        $this->profileCompletion = $this->calculateProfileCompletion();
        $this->insights = $this->getInsights();
        $this->activities = $this->getRecentActivities();
        $this->featuredProject = $this->getFeaturedProject();
    }

    public function render()
    {
        return view('components.dashboard');
    }

    // -----------------------------
    // 📊 STATS SECTION
    // -----------------------------
    private function buildStats()
    {
        return [
            'active_projects' => $this->user->projects()->count(),

            'projects_this_month' => $this->user->projects()
                ->whereMonth('created_at', now()->month)
                ->count(),

            'total_certificates' => $this->user->certificates()->count(),

            'certificates_pending' => $this->user->certificates()
                ->whereNull('file_path')
                ->count(),

            'verified_skills' => $this->user->skills()->count(),

            // ✅ Experience calculation (NO database column needed)
            'years_experience' => round(
                $this->user->experiences()
                    ->get()
                    ->sum(function ($exp) {
                        $start = Carbon::parse($exp->start_date);

                        $end = $exp->currently_working
                            ? now()
                            : Carbon::parse($exp->end_date);

                        return $start->diffInMonths($end) / 12;
                    }),
                1
            ),
        ];
    }

    // -----------------------------
    // 📈 PROFILE COMPLETION
    // -----------------------------
    private function calculateProfileCompletion()
    {
        $user = $this->user;

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
    // 🤖 AI INSIGHTS
    // -----------------------------
    private function getInsights()
    {
        return [
            'message' =>
            'Our AI analyzed your profile. Adding more backend + DevOps skills can increase your job match rate.',
        ];
    }

    // -----------------------------
    // 🕒 RECENT ACTIVITIES
    // -----------------------------
    private function getRecentActivities($limit = 3)
    {
        $user = $this->user;
        $activities = collect();

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

    // -----------------------------
    // ⭐ FEATURED PROJECT
    // -----------------------------
    private function getFeaturedProject()
    {
        $project = $this->user->projects()->latest()->first();

        if (!$project) {
            return (object)[
                'title' => 'No Project Yet',
                'description' => 'Start building your first project to showcase here.',
                'tags' => 'Laravel,PHP',
                'thumbnail' => null,
                'demo_url' => '#',
            ];
        }

        return $project;
    }
}
