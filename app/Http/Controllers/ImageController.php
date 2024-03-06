<?php

namespace App\Http\Controllers;

use App\Models\image;
use App\Models\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{


    public function create() {
        $project_id = "0";
        if(sizeof(request()->query) > 0) {
            $project_id = array(request()->query);
        }

        $projects = project::all();

        return view("images.create", ['project_id' => $project_id, 'projects' => $projects]);
    }

    public function store() {

        if(request()->file('image') != null) {
            $file = request()->file('image');
            $filename = $file->getClientOriginalName();
            $newfilename = "original_".$filename;
            $content = file_get_contents($file->getLinkTarget());
            Storage::disk('public')->put($newfilename, $content);

            $projects = project::all();
            $project_id = array(request()->query)[0];
            dd($project_id);

            return view('images.create', ['image' => Storage::url($newfilename), 'projects' => $projects, 'project_id' => $project_id]);
        }
        $file = request()->file("file");
        $filename = request()->filename.".png";
        $content = file_get_contents($file->getLinkTarget());
        Storage::disk('public')->put($filename, $content);
        $path = Storage::url($filename);

        $data = [
            "name" => $filename,
            "path" => $path,
            "project_id" => intval(request()->project_id),
        ];

        image::create($data);

        return redirect()->route('project.index');
    }

    public function destroy(image $image) {
        Storage::delete($image->path);
        $image->delete();

        return redirect()->back();
    }

}
