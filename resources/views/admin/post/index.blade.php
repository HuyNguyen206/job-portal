@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-4">
        @include('admin.partials.left-menu')
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Menu
                <a href="{{route('dashboard.create')}}" class="btn btn-primary float-right">Create post</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Stt</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Image</th>
                        <th scope="col">Content</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$post->title}}</td>
                            <td><span class="badge p-2 {{$post->status ? "badge-success" : "badge-warning" }}">{{$post->status ? 'live' : 'draft'}}</span></td>
                            <td><img src="{{Storage::url($post->image)}}" style="width: 200px" alt=""></td>
                            <td>{{Str::limit($post->content, 30)}}</td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <td>
                                <div class="btn btn-group">
                                    <a href="{{route('dashboard.edit', $post->slug)}}" class="btn btn-success">Edit</a>
                                    <form id="post-{{$post->id}}" action="{{route('dashboard.delete', $post->slug)}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <a onclick='event.preventDefault(); if(confirm("Do you want to delete this post?")) document.getElementById("{{'post-'.$post->id}}").submit()' class="btn btn-danger">Delete</a>
                                </div>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                No post
                            </td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
    <div class="row">
        {{$posts->links()}}
    </div>

@endsection
