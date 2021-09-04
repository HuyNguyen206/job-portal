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
                <a href="{{route('testial.create')}}" class="btn btn-primary float-right">Create testimonial</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Stt</th>
                        <th scope="col">Name</th>
                        <th scope="col">Profession</th>
                        <th scope="col">Content</th>
                        <th scope="col">Video</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($testimonials as $testimonial)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$testimonial->name}}</td>
                            <td>{{$testimonial->profession}}</td>
                            <td>{{Str::limit($testimonial->content, 30)}}</td>
                            <td>Video</td>
                            <td>{{$testimonial->created_at->diffForHumans()}}</td>
                            <td>
                                <div class="btn btn-group">
                                    <a href="{{route('testial.edit', $testimonial->id)}}" class="btn btn-success">Edit</a>
                                    <form id="testimonial-{{$testimonial->id}}" action="{{route('testial.delete', $testimonial->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <a onclick='event.preventDefault(); if(confirm("Do you want to delete this testimonial?")) document.getElementById("{{'testimonial-'.$testimonial->id}}").submit()' class="btn btn-danger">Delete</a>
                                </div>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                No testimonial
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
        {{$testimonials->links()}}
    </div>

@endsection
