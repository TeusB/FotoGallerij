@extends('layouts.pickAlbum')
@extends('layouts.app')
@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>homePhotos pagina</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (!empty($level) && $level >= 2)
        <form method="post" action="{{ route('photoAlbumInsert') }}">
            {{ csrf_field() }}
            <label for="name">album Name</label>
            <input type="text" name="albumName" required>
            <button type="submit">insert</button>
        </form>
    @endif

    @if (!empty($level))
        <form method="post" action="{{ route('logout') }}">
            {{ csrf_field() }}
            <input type="hidden" name="logout" required>
            <button type="submit">logout</button>
        </form>

        <form method="post" enctype="multipart/form-data" action="{{ route('photoInsert') }}">
            {{ csrf_field() }}
            <label for="image">image</label>
            <input type="file" name="image" required>

            <label for="photoName">PhotoName</label>
            <input type="text" name="photoName" required>

            <label for="prompt">Prompt</label>
            <input type="text" name="prompt" required>

            <label for="website">Website</label>
            <input type="text" name="website" required>

            <label for="idAlbum">album</label>
            <select class="form-control" name="idAlbum">
                @foreach ($albums as $key => $value)
                    <option value="{{ $key }}" {{ $key == 1 ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>

            <button type="submit">insert</button>
        </form>
    @endif
    @if (empty($level))
        Login om fotos toetevoegen
        <br>
        <br>
    @endif


@endsection
