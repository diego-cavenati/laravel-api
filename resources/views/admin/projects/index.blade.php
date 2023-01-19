@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="heading d-flex justify-content-between">
        <h2>Projects</h2>

        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        <div>
            <a href="{{route('admin.projects.create')}}" class="btn btn-primary">Add Item</a>
        </div>
    </div>
    <div class="row">
        <div class="col col-table">
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>slug</th>
                        <th>cover image</th>
                        <th>description</th>
                        <th>vote</th>
                        <th>link</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->slug }}</td>
                        <td>
                            @if($project->cover_image)
                            <img width="200px" src="{{asset('storage/' . $project->cover_image)}}" alt="">
                            @else
                            <span class="placeholder col-3 placeholder-lg bg-primary w-100 h-100">
                                Placeholder
                            </span>
                            @endif
                        </td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->vote }}</td>
                        <td>{{ $project->link }}</td>
                        <td>
                            <a href="{{route('admin.projects.edit', $project->slug)}}">edit</a>
                            <a href="{{route('admin.projects.show', $project->slug)}}">view</a>


                            <!-- Modal trigger button -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#project-{{$project->id}}">
                                Delete
                            </button>

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="project-{{$project->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modal-{{$project->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal-{{$project->id}}">Delete {{$project->title}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete this project?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{route('admin.projects.destroy', $project->slug)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Confirm</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @empty
                    <p>There are no projects</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection