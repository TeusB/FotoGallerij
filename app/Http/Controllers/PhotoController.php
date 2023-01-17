<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PhotoController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
            $validate = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'photoName' => 'required|max:50|min:1',
                'prompt' => 'required|max:50',
                'website' => 'required|max:50',
                'idAlbum' => 'required|integer',
            ]);

            list($width, $height) = getimagesize($validate["image"]);

            $photo = new Photo();
            $photo->photoName = $validate["photoName"];
            $photo->imageStoreName = time() . '.' . $request->image->extension();
            $photo->idAuthor = auth()->user()->id;
            $photo->prompt = $validate["prompt"];
            $photo->website = $validate["website"];
            $photo->height = $height;
            $photo->width = $width;
            $photo->idAlbum = $validate["idAlbum"];

            if ($photo->save()) {
                $request->image->move(public_path('images'), $photo->imageStoreName);
                return back()->withErrors('je foto is toegevoegd');
            }
            return back()->withErrors('kon foto niet toevoegen');
        }
        return back()->withErrors('je moet inloggen');
    }
}
