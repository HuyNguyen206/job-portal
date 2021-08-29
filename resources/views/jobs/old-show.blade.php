@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$job->title}}</div>

                    <div class="card-body">
                        <p>
                        <h3>Description</h3>
                        {{$job->description}}
                        </p>
                        <p>
                        <h3>Duties</h3>
                        {{$job->roles}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Short Info</div>

                    <div class="card-body">
                        <p>Company: <a href="{{route('companies.show', $job->company->slug)}}">{{$job->company->name}}</a></p>
                        <p>Address:{{$job->address}}</p>
                        <p>Employment Type: {{$job->type}}</p>
                        <p>Position: {{$job->position}}</p>
                        <p>Post: {{$job->created_at->diffForHumans()}}</p>
                        <p>Last date: {{$job->last_date->toFormattedDateString()}}</p>
                    </div>
                </div>
                @auth
                    @if (auth()->user()->isSeeker() && !$job->isApplied())
                        <apply-job job-slug="{{$job->slug}}"></apply-job>
                    @endif
                        <save-job job-slug="{{$job->slug}}" is-save="{{$isSave}}"></save-job>
                @endauth

            </div>
        </div>
@endsection
