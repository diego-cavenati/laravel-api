@extends('layouts.admin')

@section('content')
<div class="container mb-5">
    <h1 class="py-5">Create a new Items</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('admin.projects.store')}}" method="post" class="card p-3" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Laravel project" aria-describedby="titleHelper" value="{{old('title')}}">
            <small id="titleHelper" class="text-muted">Add the item title here, you have to fill it</small>
        </div>
        @error('title')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        <div class="mb-3">
            <label for="cover_image" class="form-label">cover_image</label>
            <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror" placeholder="Cover-image.jpg" aria-describedby="cover_imageHelper" value="{{old('cover_image')}}">
            <small id="cover_imageHelper" class="text-muted">Add the item cover_image here, you have to fill it</small>
        </div>
        @error('cover_image')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        <div class="mb-3">
            <label for="type_id" class="form-label">Types</label>
            <select class="form-select form-select-lg @error('type_id') 'is-invalid' @enderror" name="type_id" id="type_id">
                <option selected>Select one</option>

                @foreach ($types as $type)
                <option value="{{$type->id}}" {{ old('type_id') ? 'selected' : '' }}>{{$type->name}}</option>
                @endforeach

            </select>
        </div>
        @error('type_id')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        <div class="mb-3">
            <label for="tecnologies" class="form-label">Tecnologies</label>
            <select multiple class="form-select form-select-sm" name="tecnologies[]" id="tecnologies">
                <option value="" disabled>Select a tecnology</option>
                @forelse ($tecnologies as $tecnology)
                @if ($errors->any())
                <option value="{{$tecnology->id}}" {{ in_array($tecnology->id, old('tecnologies', [])) ? 'selected' : '' }}>{{$tecnology->name}}</option>
                @else
                <option value="{{$tecnology->id}}">{{$tecnology->name}}</option>
                @endif
                @empty
                <option value="" disabled>Sorry 😥 no tecnologies here</option>
                @endforelse
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label @error('description') is-invalid @enderror">Description</label>
            <textarea class="form-control" name="description" id="description" rows="4">{{old('description')}}</textarea>
        </div>
        @error('description')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        <div class="mb-3">
            <label for="vote" class="form-label">Vote</label>
            <input type="text" name="vote" id="vote" class="form-control @error('vote') is-invalid @enderror" placeholder="4" aria-describedby="voteHelper" value="{{old('vote')}}">
            <small id="voteHelper" class="text-muted">Add the vote here, max 10 characters</small>
        </div>
        @error('vote')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" name="link" id="link" class="form-control @error('link') is-invalid @enderror" placeholder="https://" aria-describedby="linkHelper" value="{{old('link')}}">
            <small id="linkHelper" class="text-muted">Add the link here, max 50 characters</small>
        </div>
        @error('link')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
@endsection