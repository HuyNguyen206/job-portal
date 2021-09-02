@extends('layouts.app-new')

@section('content')
    <div class="container my-3">
        <div class="row">
            <form action="{{route('jobs.get-all-job')}}">
                <div class="form-inline">
                    <div class="form-group mr-3">
                        <label for="" class="mr-1">Keyword</label>
                        <input type="text" name="keyword" class="form-control p-0" value="{{request()->keyword ?? null}}">
                    </div>
                    <div class="form-group mr-3">
                        <label class="mr-1" for="">Category</label>
                        <select  id="" name="category_id" class="form-control">
                            <option value="0" disabled>--Select Category--</option>
                            <option {{request()->category_id === "all" ? "selected" : ''}} value="all">All</option>
                            @foreach($categories as $category)
                                <option @if(request()->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mr-3">
                        <label class="mr-1" for="">Address</label>
                        <input type="text" name="address" class="form-control" value="{{request()->address ?? null}}">
                    </div>
                    <div class="form-group mr-3">
                        <label class="mr-1" for="">Type</label>
                        <select class="form-control" name="type">
                            <option disabled>--Select type--</option>
                            <option {{request()->type === "all" ? "selected" : ''}} value="all">All</option>
                            <option {{request()->type === "fulltime" ? "selected" : ''}} value="fulltime">Full time</option>
                            <option {{request()->type === "parttime" ? "selected" : ''}} value="parttime">Part time</option>
                            <option {{request()->type === "casual" ? "selected" : ''}} value="casual">Casual</option>
                        </select>
                    </div>
                    <button class="btn btn-success mt-2 mx-auto" type="submit">Search</button>
                </div>
            </form>

        </div>
        <div class="row">
            <h1>
                All Jobs
            </h1>
            @include('components.list-job')
        </div>
            {{$jobs->appends(request()->all())->onEachSide(5)->links()}}
    </div>
@endsection
@section('css')
    <style>
        .pagination{
        justify-content: center;
        }
        .form-control {
            height: 40px;
        }
    </style>

@endsection
