@extends('layouts.app-new')

@section('content')
        <div class="row">
            <div class="col-12">
                <h2>
                    {{$post->title}}
                </h2>
            </div>
        </div>
        <div class="row">
            <img src="{{Storage::url($post->image)}}" class="w-100" alt="">
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <h5>Create by:{{$post->user->name}}</h5>
                <span class="text-muted">{{$post->created_at->toFormattedDateString()}}</span>
            </div>
            <div class="col-12">
                <div class="my-5">
                    <p>
                        {{$post->content}}
                    </p>
                </div>
                <div>
                </div>
            </div>
        </div>
@endsection
