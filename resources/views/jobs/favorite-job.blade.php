@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @forelse ($jobs  as $job)
            <div class="col-12">
                <div class="card mt-2">
                    <div class="card-header">
                        <p>
                            {{$job->title}}
                        </p>
                    </div>
                    <div class="card-body">
                        <p>
                            {{$job->description}}
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{route('jobs.show', $job->slug)}}">Read</a>
                        <span>{{$job->last_date->toFormattedDateString()}}</span>
                    </div>
                </div>
            </div>
                @empty
                    <h2>
                        You haven't save any job yet
                    </h2>
            @endforelse
        </div>
    </div>
@endsection
@section('css')
    <style>
        .pagination{
        justify-content: center;
        }
    </style>

@endsection
