<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\User;
use App\Models\user_project;
use Illuminate\Http\Request;

class UserProjectController extends Controller
{
    public function destroy(project $project, User $member) {

        $where = ['project_id' => $project->id, 'user_id' => $member->id];
        user_project::where($where)->delete();

        return redirect()->back();
    }
}
