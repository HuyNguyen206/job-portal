@extends('layouts.app-new')

@section('content')
        <div class="row">
            <div class="col-md-12">
               <h2>
                   {{$categoryName}}
               </h2>
            </div>
            <table class="table">
                <thead>
                <th></th>
                <th>Position</th>
                <th>Address</th>
                <th>Date post</th>
                <th>Action</th>
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
            <div class="m-auto">
                {{$jobs->links()}}
             </div>

        </div>
@endsection
