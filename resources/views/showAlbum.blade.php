@extends('layouts.pickAlbum')
@extends('layouts.app')
@section('sidebar')
    @parent
@endsection

@section('content')
    <h1></h1>
    <div style="display: flex; flex-wrap: wrap;">
        @foreach ($photoObject as $photo)
            <div style="display: flex; flex-direction: column;">
                <p>photoName: {{ $photo->photoName }}</p>
                <p>height: {{ $photo->height }}</p>
                <p>width: {{ $photo->width }}</p>
                <p>author: {{ $photo->user->name }}</p>
                <p>prompt: {{ $photo->prompt }}</p>

                <img src="{{ URL::to('/') . '/images/' . $photo->imageStoreName }}"width="320" height="300">
            </div>
        @endforeach
    </div>
@endsection
