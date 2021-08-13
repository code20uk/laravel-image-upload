<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('upload')->with("images", $images);
    }
    public function validate_upload_image(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image_name = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $image_name);
        // $request->image->storeAs('images', $image_name);
        // $request->image->storeAs('images', $image_name, 's3');

        $image = new Image;
        $image->name = $image_name;
        $image->save();
        return back()
            ->with('success', 'Image uploaded successfully.')
            ->with('image', $image_name);
    }
}
