@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>Recent Jobs</h1>
        <table class="table">
            <thead>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            </thead>
            <tbody>
            @foreach ($jobs as $job)
                <tr>
                    <td>
                        Avatar
                    </td>
                    <td class="d-flex flex-column">
                        <span>Position: {{$job->position}}</span>
                        <span>
                           <i class="icon fas fa-2x fa-clock"></i> &nbsp;{{$job->type}}
                        </span>

                    </td>
                    <td><i class="icon fas fa-2x fa-map-marker-alt"></i>&nbsp;Address: {{$job->address}}</td>
                    <td><i class="icon fas fa-2x fa-globe-asia"></i>&nbsp;Date: {{$job->created_at->diffForHumans()}}</td>
                    <td><a href="{{route('jobs.show', $job->slug)}}" class="btn btn-sm btn-success">Apply</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('style')
    <style>
        .icon{
            color: #3f9ae5;
        }
    </style>
@endsection
