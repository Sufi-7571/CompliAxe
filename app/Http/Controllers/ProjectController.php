<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Auth::user()->projects()->latest()->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url'  => 'required|url|unique:projects,url',
        ]);

        Auth::user()->projects()->create($request->only('name', 'url'));

        return redirect()->route('projects.index')->with('success', 'Project added successfully.');
    }

    // Show single project
    public function show(Project $project)
    {
        $this->authorize('view', $project); 
        $project->load('scans.issues');
        return view('projects.show', compact('project'));
    }
}
