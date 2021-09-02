@extends('layouts.app-new')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>
                    {{$job->title}}
                </h2>
            </div>
        </div>
        <div class="row">
            <img src="{{asset('jobfinder/images/job-finder.jpg')}}" class="w-100" alt="">
        </div>
        <div class="row mt-4">
            <div class="col-md-8 ">
                <div class="row">
                    <div class="col-10">
                        <div class="mb-5">
                            <h5>Description</h5>
                            <p>
                                {{$job->position}}
                            </p>
                        </div>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn bg-primary text-white rounded"
                                data-toggle="modal" data-target="#job-email">
                            <i class="fas fa-2x fa-envelope"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-5">
                    <h5>Description</h5>
                    <p>
                        {{$job->description}}
                    </p>
                </div>
                <div class="mb-5">
                    <h5>Role and responsibility</h5>
                    <p>
                    {{$job->roles}}
                </div>
                <div class="mb-5">
                    <h5>Number of vacancy</h5>
                    <p>
                        {{$job->number_of_vacancy ?? 0}}
                    </p>
                </div>
                <div class="mb-5">
                    <h5>Year of experience</h5>
                    <p>
                        {{$job->year_of_experience ?? 0}}
                    </p>
                </div>
                <div class="mb-5">
                    <h5>Gender</h5>
                    <p>
                        {{$job->gender}}
                    </p>
                </div>
                <div class="mb-5">
                    <h5>Salary</h5>
                    <p>
                        {{$job->salary}}
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <h5>Short info</h5>
                    <p>Company: <a href="{{route('companies.show', $job->company->slug)}}">{{$job->company->name}}</a></p>
                    <p>Address:{{$job->address}}</p>
                    <p>Employment Type: {{$job->type}}</p>
                    <p>Position: {{$job->position}}</p>
                    <p>Post: {{$job->created_at->diffForHumans()}}</p>
                    <p>Last date: {{$job->last_date->toFormattedDateString()}}</p>
                            <p>
                                <a href="{{route('companies.show', $job->company->slug)}}" class="btn btn-warning text-white d-block">Visit company page</a>
                            </p>
                    @auth()
                        @if (($isSeeker = auth()->user()->isSeeker()) && !$job->isApplied())
                            <apply-job job-slug="{{$job->slug}}"></apply-job>
                        @endif
                        @if($isSeeker)
                        <save-job job-slug="{{$job->slug}}" is-save="{{$isSave}}"></save-job>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>

{{--    @include('partials.mail-modal')--}}
        <mail-form job-id="{{$job->id}}" is-login="{{auth()->check()}}"></mail-form>
@endsection
