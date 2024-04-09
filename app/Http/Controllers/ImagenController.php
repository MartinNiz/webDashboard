<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;


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

        // Crear una nueva entrada en la tabla de imágenes de productos
        $productImage = new ProductImage();
        $productImage->product_id = $request->product_id; // Asigna el ID del producto correspondiente
        $productImage->path = $imageName;
        $productImage->save();

        return response()->json(['image' => $imageName]);
    }

    public function destroy(Request $request)
    {
        $imageName = $request->input('path');

        $imagePath = public_path('uploads/' . $imageName);

        if(File::exists($imagePath)) {
            // Elimina el archivo
            File::delete($imagePath);
        } 

        // Elimina la entrada de la imagen de la base de datos (esto dependerá de cómo esté estructurada tu base de datos y tu lógica de la aplicación)
        ProductImage::where('path', $imagePath)->delete();
    
        return response()->json(['message' => 'Image deleted successfully']);

    }
}
