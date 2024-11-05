<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Type;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('backoffice.projects.index', compact('projects'));
    }

    public function create()
    {
        $types = Type::all();
        return view('backoffice.projects.create', compact('types'));
    } 

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|string',
            'url' => 'nullable|url',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|array',
            'technologies.*' => 'exists:technologies,id'
        ]);
    
        $project = Project::create($data);
        $project->technologies()->sync($request->input('technologies', []));
    
        return redirect()->route('backoffice.projects.index');
    }
    
    
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('backoffice.projects.edit', compact('project', 'types'));
    }
    
    public function update(Request $request, Project $project)
    {
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'image' => 'nullable|string',
        'url' => 'nullable|url',
        'type_id' => 'nullable|exists:types,id',
        'technologies' => 'nullable|array',
        'technologies.*' => 'exists:technologies,id'
    ]);

    $project->update($data);
    $project->technologies()->sync($request->input('technologies', []));

    return redirect()->route('backoffice.projects.index');
    }


    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('backoffice.projects.index');
    }
}
