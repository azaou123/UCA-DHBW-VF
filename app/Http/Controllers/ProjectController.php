<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'objective' => 'required|string',
            'duration_in_months' => 'required|integer',
            'teachers' => 'required|array',
            'students' => 'required|array',
            'partners' => 'required|array',
            'project_details' => 'required|file|mimes:pdf',
            'image_project' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $project = new Project();
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->objective = $request->input('objective'); // Changed from 'Objective'
        $project->duration_in_months = $request->input('duration_in_months');
        $project->slug = Str::slug($request->input('title'));

        if ($request->hasFile('image_project')) {
            $imageProject = $request->file('image_project');
            $filename = time() . '_' . $imageProject->getClientOriginalName();
            $imageProject->storeAs('public/projects', $filename);

            $destinationPath = public_path('storage/projects');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true); // Create directory if it doesn't exist
            }
            $imageProject->move($destinationPath, $filename);

            $project->image = $filename;
        }
        if ($request->hasFile('project_details')) {
            $projectDetails = $request->file('project_details');
            $filename = time() . '_' . $projectDetails->getClientOriginalName();
            // $projectDetails->storeAs('public/projects/project_details', $filename);

            $destinationPath = public_path('storage/projects/project_details');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true); // Create directory if it doesn't exist
            }
            $projectDetails->move($destinationPath, $filename);

            $project->project_details = $filename;
        }

        $project->save();

        // Attach teachers if selected
        if ($request->has('teachers')) {
            $project->teachers()->attach($request->input('teachers'));
        }

        // Attach students if selected
        if ($request->has('students')) {
            $project->students()->attach($request->input('students'));
        }

        // Attach partners if selected
        if ($request->has('partners')) {
            $project->partners()->attach($request->input('partners'));
        }

        return redirect()->back()->with('success', 'Project added successfully');
    }

    public function destroy(Project $project)
    {
        // Delete the associated image file if it exists
        if ($project->image) {
            $imagePath = storage_path('app/public/projects/' . $project->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            // delete the image from the public folder
            $destinationPath = public_path('storage/projects');
            if (file_exists($destinationPath . '/' . $project->image)) {
                unlink($destinationPath . '/' . $project->image);
            }
        }
        if ($project->project_details) {
            $projectDetailsPath = storage_path('app/public/projects/project_details/' . $project->project_details);
            if (file_exists($projectDetailsPath)) {
                unlink($projectDetailsPath);
            }
            // delete the project_details from the public folder
            $destinationPath = public_path('storage/projects/project_details');
            if (file_exists($destinationPath . '/' . $project->project_details)) {
                unlink($destinationPath . '/' . $project->project_details);
            }
        }
        // Delete the project
        $project->delete();
        return redirect()->back()->with('success', 'Project deleted successfully.');
    }
    public function showProjects(Request $request)
    {
        $projects = Project::paginate(3);
        if ($request->ajax()) {
            return view('front.research_projects.research_projects', compact('projects'));
        }

        return view('front.research_projects.research_projects', ['projects' => $projects]);
    }

    public function displayProject(Project $projects)
    {
        //$news = News::findOrFail($id);

        return view('front.research_projects.showProjects', ['projects' => $projects]);
    }
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'objective' => 'required|string',
            'duration_in_months' => 'required|integer',
            'teachers' => 'required|array',
            'students' => 'required|array',
            'partners' => 'required|array',
            'project_details' => 'file|mimes:pdf',
            'image_project' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->slug = Str::slug($project->title);
        $project->objective = $request->input('objective');
        $project->duration_in_months = $request->input('duration_in_months');
        // Handle the image_project field
        if ($request->hasFile('image_project')) {
            // Delete the old image file if it exists
            if ($project->image) {
                $oldImagePath = storage_path('app/public/projects/' . $project->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }

                // delete the image from the public folder
                $destinationPath = public_path('storage/projects');
                if (file_exists($destinationPath . '/' . $project->image)) {
                    unlink($destinationPath . '/' . $project->image);
                }
            }

            // Store the new image file
            $imageProject = $request->file('image_project');
            $filename = time() . '_' . $imageProject->getClientOriginalName();
            $imageProject->storeAs('public/projects/', $filename);

            $destinationPath = public_path('storage/projects');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true); // Create directory if it doesn't exist
            }
            $imageProject->move($destinationPath, $filename);

            $project->image = $filename;
        }

        // Handle the project_details field
        if ($request->hasFile('project_details')) {
            // Delete the old project_details file if it exists
            if ($project->project_details) {
                $oldProjectDetailsPath = storage_path('app/public/projects/project_details/' . $project->project_details);
                if (file_exists($oldProjectDetailsPath)) {
                    unlink($oldProjectDetailsPath);
                }

                // delete the project_details from the public folder
                $destinationPath = public_path('storage/projects/project_details');
                if (file_exists($destinationPath . '/' . $project->project_details)) {
                    unlink($destinationPath . '/' . $project->project_details);
                }
            }

            // Store the new project_details file
            $projectDetails = $request->file('project_details');
            $filename = time() . '_' . $projectDetails->getClientOriginalName();
            $projectDetails->storeAs('public/projects/project_details/', $filename);

            $destinationPath = public_path('storage/projects/project_details');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true); // Create directory if it doesn't exist
            }
            $projectDetails->move($destinationPath, $filename);

            $project->project_details = $filename;
        }

        $project->save();

        // Sync teachers
        $project->teachers()->sync($request->input('teachers'));

        // Sync students
        $project->students()->sync($request->input('students'));

        // Sync partners
        $project->partners()->sync($request->input('partners'));

        return redirect()->back()->with('success', 'Project updated successfully');
    }
}
