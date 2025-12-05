<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Scan;
use Illuminate\Support\Facades\Auth;

class ScanController extends Controller
{

    public function store(Project $project)
    {
        
        $this->authorize('view', $project);

        // Create a new scan entry
        $scan = $project->scans()->create([
            'status' => 'pending',
        ]);

        return redirect()->route('projects.show', $project)->with('success', 'Scan created successfully.');
    }
}
