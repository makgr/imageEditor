<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class HomeCOntroller extends Controller
{
    public function home(){
        $path = public_path('images');
        $files = File::files($path);
        return view('welcome',compact('files'));
    }

    public function handleImageFile(Request $request){
        // $imageFile = $_FILES['imageFile'];
        // $imageName = $_POST['imageName'];
        $imageFile = $request->file('imageFile');
        $imageName = $request->imageName;

        // $editedImage = file_get_contents($imageFile['tmp_name']);
        $editedImage = file_get_contents($imageFile->getPathname());
        // file_put_contents($imageName, $editedImage);
        File::put(public_path().'/'.$imageName, $editedImage);

        // to upload to the server
        // move_uploaded_file($imageFile['tmp_name'], 'image-name-to.ext');

        $resp = json_encode(['msg'=>'done']);
        return $resp;
    }
}
