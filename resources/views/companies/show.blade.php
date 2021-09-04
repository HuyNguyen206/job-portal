@extends('layouts.app-new')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="company-profile">
                    @if ($company->cover_photo)
                        <img src="{{Storage::url($company->cover_photo)}}" class="w-100" alt="">
                    @endif

                    <div class="company-desc mt-2">
                        @if ($company->logo)
                            <img src="{{Storage::url($company->logo)}}" style="width: 100px" alt="">
                        @endif
                        <p>{{$company->description}}</p>
                        <h1>Name-{{$company->name}}</h1>
                        <p>Slogan-{{$company->slogan}}-&nbsp;Address-{{$company->address}}-&nbsp; Phone-{{$company->phone}}-&nbsp; Website-{{$company->website}}</p>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach ($company->jobs as $job)
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
@endsection
