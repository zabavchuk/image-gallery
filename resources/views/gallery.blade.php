<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gallery</title>
    <link href="/css/app.css" rel="stylesheet">

</head>
<body>

    <ul class="nav nav-pills justify-content-center mt-5">
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">Upload</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{route('gallery')}}">Gallery</a>
        </li>
    </ul>

    @if(count($tags) > 0)
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="justify-content-center mt-5" aria-label="Filters">
                        <button type="button" class="btn tag-filter reset-tag-filter btn-dark">Reset</button>
                        @foreach($tags as $tag)
                        <button type="button" class="btn tag-filter {{in_array($tag, $selectedTags) ? 'btn-secondary' : ''}}" data-filter="{{$tag}}">#{{$tag}}</button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container mt-5">
        <div class="row">
            @forelse($images as $image)
                <div class="col-xl-4 col-lg-4 col-md-6 col-xs-12 mb-5">
                    <div class="card">
                        <img src="{{'/storage/'.$image->image}}" class="card-img-top" alt="{{$image->title}}">
                    </div>
                    <div class="body-card">{{$image->tags}}</div>
                </div>
            @empty
                <h1 class="text-danger">There is no images</h1>
            @endforelse
        </div>
        <div class="row justify-content-center">
            {{ $images->links("pagination::bootstrap-4") }}
        </div>
    </div>
    <script src="{{asset('js/filter.js')}}" type="text/javascript"></script>

</body>
</html>