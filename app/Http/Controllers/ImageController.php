<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{


    public function create() {
        return view("images.create");
    }

    public function store() {
        $file = request()->file("file");
        $filename = request()->filename.".png";
        $content = file_get_contents($file->getLinkTarget());
        Storage::put($filename, $content);
        $path = Storage::url($filename);

        $data = [
            "name" => $filename,
            "path" => $path,
            "project_id" => 1,
        ];

        image::create($data);

        return redirect()->route("image.create")->with("message", "afbeelding succesvol verwerkt");
    }

}
