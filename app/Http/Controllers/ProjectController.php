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
        $user = User::where('id', $userId)->first();

        $projects = $user->project();

        return view('project.index')->with('projects',$projects);
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
    }
}
