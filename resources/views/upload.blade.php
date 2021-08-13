@extends('layouts.app')

@section('content')

<main class="form-signin">
    <img class="mb-4" src="https://fastsnippets.com/wp-content/uploads/2021/04/cropped-logo.png" alt="" style="max-width: 100%;">
    <h1 class="h3 mb-3 fw-normal">Select a file to upload</h1>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
    <img style="max-width: 100%;" src="uploads/{{ Session::get('image') }}">
    @endif

    @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-block">
        <strong>{{ $error }}</strong>
    </div>
    @endforeach

    @endif

    <form action="{{route('image.upload.validation')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <input class="form-control form-control-lg" id="image" name="image" type="file" required>
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-5" type="submit">Upload</button>
    </form>
    <div class="row mt-5">
        @if($images->count() > 0)
        @foreach($images as $image)
        <div class="col-12 mt-2">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('uploads/'.$image->name)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">{{$image->name}}</p>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</main>


@endsection