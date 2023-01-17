<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\DB;
use App\Models\Photo;



class AlbumController extends Controller
{

    public function getAlbums()
    {
        return Album::pluck('albumName', 'id');
    }

    public function showMain()
    {
        $albums = $this->getAlbums();
        if (Auth::check()) {
            $level = Auth::user()->roleLevel;
            return view("homePhotos", compact('albums', 'level'));
        }
        return view("homePhotos", compact('albums'));
    }

    public function getPics(int $idAlbum)
    {
        return DB::table('photo')->where('idAlbum', $idAlbum)->get();
    }

    public function showAlbum(Request $request)
    {
        $request->validate([
            'idAlbum' => 'required|integer',
        ]);

        $photoObject = Photo::with('user')->where('idAlbum', $request->idAlbum)->get();
        if (isset($photoObject[0])) {
            return view("showAlbum", [
                'photoObject' => $photoObject,
                'albums' => $this->getAlbums()
            ]);
        }
        return redirect()->intended('homePhotos')->withErrors('kon album niet vinden of er zijn nog geen fotos toegevoegd');
    }


    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->roleLevel >= 2) {
            $validate = $request->validate([
                'albumName'   => 'required|unique:album',
            ]);
            $user = new Album();
            $user->albumName = $validate["albumName"];;
            if ($user->save()) {
                return redirect()->intended('homePhotos');
            }
            return back()->withErrors('kon album niet toevoegen');
        }
        return back()->withErrors('je hebt geen rechten om dit uit te voeren');
    }
}
