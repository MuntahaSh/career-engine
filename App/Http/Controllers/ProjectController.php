<?php

namespace App\Http\Controllers;


use App\Models\Project;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use App\Services\ImageUploadService;
use App\Services\ProjectFeatureService;
use App\Services\ActivityService;

class ProjectController extends Controller
{


    private ImageUploadService $imageService;
    private ActivityService $activityService;



    public function __construct(
        ImageUploadService $imageService,
            ActivityService $activityService


    ) {

        $this->imageService = $imageService;
    $this->activityService = $activityService;

    }

    public function index(Request $request)
    {

        $query = Project::query()
            ->where(
                'user_id',
                Auth::id()
            );

        if ($request->filled('search')) {

            $search = $request->search;


            $query->where(function ($q) use ($search) {

                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('summary', 'like', "%{$search}%")
                    ->orWhere('tech_stack', 'like', "%{$search}%");
            });
        }


        if ($request->filled('category')) {

            $query->where(
                'category',
                $request->category
            );
        }

        if ($request->filled('visibility')) {

            if ($request->visibility === 'public') {
                $query->where('is_public', 1);
            }

            if ($request->visibility === 'private') {
                $query->where('is_public', 0);
            }
        }

        $projects = $query
            ->latest()
            ->paginate(1)
            ->withQueryString();

        return view(
            'project',
            compact('projects')
        );
    }

    public function create()
    {

        return view('CUproject', [
            'mode' => 'create',
            'project' => null
        ]);
    }





    public function store(Request $request)
    {

        $data = $this->validateProject($request);



        $image = null;



        if ($request->hasFile('thumbnail')) {

            $image = $this->imageService->upload(
                $request->file('thumbnail'),
                'project-thumbnails/' . Auth::id()
            );
        }


        $project = Project::create([


            'user_id' => Auth::id(),

            'title' => $data['title'],

            'slug' => $this->makeSlug($data['title']),

            'category' => $data['category'],

            'summary' => $data['summary'],

            'description' => $data['description'],

            'tech_stack' => $this->normalizeTech($data['tech_stack'] ?? null),

            'github_url' => $data['github_url'] ?? null,

            'demo_url' => $data['demo_url'] ?? null,

            'thumbnail' => $image,

            'is_public' => $request->boolean('is_public'),


        ]);
    $this->activityService->create(

    auth()->user(),

    'project_created',

    'Created new project',

    $project->title,

    'add'

);



        return redirect()
            ->route('projects.index')
            ->with('success', 'Project created successfully');
    }




    public function edit(Project $project)
    {

        $this->checkOwner($project);


        return view('CUproject', [

            'mode' => 'edit',

            'project' => $project

        ]);
    }




    public function update(Request $request, Project $project)
    {


        $this->checkOwner($project);



        $data = $this->validateProject($request);



        $image = $project->thumbnail;


        if ($request->hasFile('thumbnail')) {

            $image = $this->imageService->replace(
                $project->thumbnail,
                $request->file('thumbnail'),
                'project-thumbnails/' . Auth::id()
            );
        }


        $project->update([


            'title' => $data['title'],

            'slug' => $this->makeSlug(
                $data['title'],
                $project
            ),

            'category' => $data['category'],

            'summary' => $data['summary'],

            'description' => $data['description'],

            'tech_stack' => $this->normalizeTech(
                $data['tech_stack'] ?? null
            ),


            'github_url' => $data['github_url'] ?? null,

            'demo_url' => $data['demo_url'] ?? null,


            'thumbnail' => $image,


            'is_public' => $request->boolean('is_public'),


        ]);


        $this->activityService->create(

    auth()->user(),

    'project_updated',

    'Updated project',

    $project->title,

    'edit'

);




        return redirect()
            ->route('projects.index')
            ->with('success', 'Project updated successfully');
    }






    public function destroy(Project $project)
    {

        $this->checkOwner($project);


        $this->imageService->delete(
            $project->thumbnail
        );

$title = $project->title;
        $project->delete();

        $this->activityService->create(

    auth()->user(),

    'project_deleted',

    'Deleted project',

    $title,

    'delete'

);



        return redirect()
            ->route('projects.index')
            ->with('success', 'Project deleted successfully');
    }






    private function validateProject(Request $request)
    {

        return $request->validate([


            'title' => [
                'required',
                'string',
                'max:255'
            ],


            'category' => [
                'required',
                'string'
            ],


            'summary' => [
                'required',
                'string',
                'max:500'
            ],


            'description' => [
                'required',
                'string'
            ],


            'github_url' => [
                'nullable',
                'url'
            ],


            'demo_url' => [
                'nullable',
                'url'
            ],


            'tech_stack' => [
                'nullable',
                'string'
            ],


            'thumbnail' => [
                'nullable',
                'image',
                'max:10240'
            ],


        ]);
    }









    private function normalizeTech($tech)
    {


        if (!$tech) {
            return null;
        }



        $list = array_filter(
            array_map(
                'trim',
                explode(',', $tech)
            )
        );



        return implode(', ', array_unique($list));
    }





    private function makeSlug($title, $ignore = null)
    {

        $slug = Str::slug($title);

        $original = $slug;

        $count = 1;



        while (
            Project::where('slug', $slug)
            ->when($ignore, function ($q) use ($ignore) {

                $q->where('id', '!=', $ignore->id);
            })
            ->exists()
        ) {

            $slug = $original . '-' . $count;

            $count++;
        }



        return $slug;
    }






    private function checkOwner(Project $project)
    {

        if ($project->user_id !== Auth::id()) {
            abort(403);
        }
    }
}
