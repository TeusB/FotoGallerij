@section('albums')
    @foreach ($albums as $key => $value)
        <a href="{{ route('album', ['idAlbum' => $key]) }}">{{ $value }}</a>
    @endforeach
