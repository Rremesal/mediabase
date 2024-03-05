<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\User;
use App\Models\user_project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $user = User::with('projects')->where('id', $userId)->get()[0];

        $projects = $user->projects;

        return view('project.index', ['projects' => $projects]);
    }

    public function create()
    {
        $users = User::all();
        return view('project.create', ['users' => $users]);
    }

    public function edit(project $project) {
        $users = User::all();
        return view('project.create', ['users' => $users, 'project' => $project]);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            "teammembers" => ['required']
        ]);

        $teammembers = $data['teammembers'];
        unset($data['teammembers']);

        $project = project::create($data);
        foreach($teammembers as $member_id) {
            user_project::create([
                'project_id' => $project->id,
                'user_id' => $member_id
            ]);
        }

        return redirect()->route('project.index');
    }
}
