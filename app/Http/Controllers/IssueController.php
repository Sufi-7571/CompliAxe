<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scan;
use App\Models\Issue;

class IssueController extends Controller
{
    // Add a new issue to a scan
    public function store(Request $request, Scan $scan)
    {
        $request->validate([
            'type'          => 'required|string|max:255',
            'severity'      => 'required|in:low,medium,high',
            'description'   => 'required|string',
            'selector'      => 'nullable|string|max:255',
            'fix_suggestion' => 'nullable|string',
        ]);

        $scan->issues()->create($request->only(
            'type',
            'severity',
            'description',
            'selector',
            'fix_suggestion'
        ));

        return back()->with('success', 'Issue added successfully.');
    }
}
