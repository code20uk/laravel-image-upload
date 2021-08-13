@extends('layouts.app')
@section('content')
<main class="form-signin">
    @if (Route::has('image.upload.view'))
    <a href="{{ route('image.upload.view') }}" class="w-100 btn btn-lg btn-primary">Upload new image</a>
    @endif
</main>

@endsection