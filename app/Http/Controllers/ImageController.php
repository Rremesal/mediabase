<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageController extends Controller
{
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
