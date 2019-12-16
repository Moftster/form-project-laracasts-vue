<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectsController extends Controller 

{

    // Show create page for adding new project

    public function create() {
        return view ('projects.create', [
            'projects' => Project::all()
        ]);
    }

    // Store new project in database

    public function store() {

        $this->validate(request(), [
            'name' => 'required',
            "description" => 'required'
        ]);
    
        Project::forceCreate([
            'name' => request('name'),
            'description' => request('description')
        ]);

        return ['message' => 'Project Created!'];

    }
}