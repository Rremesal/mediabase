<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
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
  
      public function resizeImage(){
        return view('resizeImage');
    }

    public function resizeImagePost(Request $request){
        $this->validate ($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = $request->file('image');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();


        $manager = new ImageManager(new Driver());

        $destinationPath = public_path('/thumbnails');
        $img = $manager->read($image->getRealPath());
        $img->resize(100,100, function($constraints){
            $constraints->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);

        return back()
        ->with('succes', 'Image Upload Succesfully')
        ->with('imageName', $input['imagename']);
        
    }


}
