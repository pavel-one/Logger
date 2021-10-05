<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create(CreateProjectRequest $request): ProjectResource
    {
        $project = Project::create([
            'name' => trim(htmlspecialchars($request->get('name')))
        ]);

        $project->users()->sync($request->get('users'));

        return ProjectResource::make($project);
    }
}
