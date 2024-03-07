<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\User;
use App\Models\user_project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    private $rules = [
        'title' => ['required'],
        'description' => ['required'],
        "teammembers" => ['required']
    ];

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
        $allUsers = User::all();
        $users = $allUsers->diff($project->users);
        return view('project.create', ['users' => $users, 'project' => $project, 'members' => $project->users]);
    }

    public function update(project $project) {

        $data = request()->validate($this->rules);

        foreach($data['teammembers'] as $member) {

            user_project::create([
                'project_id' => $project->id,
                'user_id' => intval($member)
            ]);
        }
        unset($data['teammembers']);
        $project->update($data);

        return redirect()->back();

    }

    public function store()
    {

        $data = request()->validate($this->rules);

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

    public function show(project $project) {
        $images = $project->images;

        return view('project.show', ['images' => $images, 'project' => $project]);
    }

    public function destroy(project $project) {
        $userProjects = user_project::where('project_id', $project->id)->get();
        if(sizeof($userProjects) > 1) {
            foreach($userProjects as $userProject) {
                $userProject->delete();
            }
        } else {
            $userProjects->delete();
        }

        $project->delete();

        return redirect()->route('project.index');
    }
}
