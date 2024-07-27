<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image_profile;
use Illuminate\Http\Request;
use app\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function perfil()
    {
        return view("blog.perfil");
    }

    public function upload(Request $request)
    {
        $img_profile = Image_profile::where("user_id", $request->id)->first();
        if( $request->hasFile("image") && $request->file("image")->isValid() ){
            $image = $request->file("image");
            $image_name = md5($image->getClientOriginalName()) .".". $image->getClientOriginalExtension();
            $image->move(public_path("images/"), $image_name);
            $img_profile->image = $image_name;
        }
        $img_profile->save();
        return redirect('/');
    }
    public function teste_one()
    {

    }
}
