<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class ImagenController extends Controller
{
    public function store(Request $request)
    {

        $image = $request->file('file');
        $imageName = Str::uuid() . '.' . $image->extension();

        // create image manager with desired driver
        $manager = new ImageManager(new Driver());
        // read image from file system
        $image = $manager->read($image);
        // save modified image in new format 
        $imagePath = public_path('uploads') . '/' . $imageName;
        $image->save($imagePath);

        return response()->json(['image' => $imageName]);
    }
}
