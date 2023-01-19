@extends('layouts.admin')

@section('content')
<div class="container mb-5">
    <h1 class="py-5">Edit Items</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('admin.projects.update', $project->slug)}}" method="post" class="card p-3" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Batman" aria-describedby="titleHelper" value="{{old('title', $project->title)}}">
            <small id="titleHelper" class="text-muted">Add the item title here, you have to fill it</small>
        </div>
        @error('title')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        <div class="mb-3">
            <img width="140" src="{{asset('storage/' . $project->cover_image)}}" alt="">
            <div>
                <label for="cover_image" class="form-label">Replace cover image</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror" placeholder="Batman" aria-describedby="cover_imageHelper" value="{{old('cover_image')}}">
                <small id="cover_imageHelper" class="text-muted">Add the item cover_image here, you have to fill it</small>
            </div>
        </div>
        @error('cover_image')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        <div class="mb-3">
            <label for="type_id" class="form-label">types</label>
            <select class="form-select form-select-lg @error('type_id') 'is-invalid' @enderror" name="type_id" id="type_id">
                <option value="">Uncategorize</option>
                @forelse ($types as $type )
                <option value="{{$type->id}}" {{ $type->id == old('type_id',  $post->type ? $post->type->id : '') ? 'selected' : '' }}>
                    {{$type->name}}
                </option>
                @empty
                <option value="">Sorry, no types in the system.</option>
                @endforelse
            </select>
        </div>
        @error('type_id')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        <div class="mb-3">
            <label for="tecnologies" class="form-label">tecnologies</label>
            <select multiple class="form-select form-select-sm" name="tecnologies[]" id="tecnologies">
                <option value="" disabled>Select a tecnology</option>
                @forelse ($tecnologies as $tecnology)
                @if ($errors->any())
                <option value="{{$tecnology->id}}" {{ in_array($tecnology->id, old('tecnologies', [])) ? 'selected' : '' }}>
                    {{$tecnology->name}}
                </option>
                @else
                <option value="{{$tecnology->id}}" {{ $project->tecnologies->contains($tecnology->id) ? 'selected' : ''}}>
                    {{$tecnology->name}}
                </option>
                @endif
                @empty
                <option value="" disabled>No tecnologies here</option>
                @endforelse
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label @error('description') is-invalid @enderror">Description</label>
            <textarea class="form-control" name="description" id="description" rows="4">{{old('description', $project->description)}}</textarea>
        </div>
        @error('description')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        <div class="mb-3">
            <label for="vote" class="form-label">Vote</label>
            <input type="text" name="vote" id="vote" class="form-control @error('vote') is-invalid @enderror" placeholder="Batman" aria-describedby="voteHelper" value="{{old('vote', $project->vote)}}">
            <small id="voteHelper" class="text-muted">Add the vote here, max 10 characters</small>
        </div>
        @error('vote')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" name="link" id="link" class="form-control @error('link') is-invalid @enderror" placeholder="Batman" aria-describedby="linkHelper" value="{{old('link', $project->link)}}">
            <small id="linkHelper" class="text-muted">Add the link here, max 50 characters</small>
        </div>
        @error('link')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        <button type="submit" class="btn btn-primary">Update</button>

    </form>
</div>
@endsection