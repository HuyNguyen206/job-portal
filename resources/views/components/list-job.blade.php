
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
                    @if ($logo = $job->company->logo)
                        <img src="{{Storage::url($logo)}}" style="width: 100px" alt="">
                    @else
                        <img src="{{Storage::url('no-image.png')}}" style="100px" alt="">
                    @endif
                </td>
                <td class="d-flex flex-column">
                    <span>Position: {{$job->position}}</span>
                    <span>
                           <i class="icon fas fa-2x fa-clock"></i> &nbsp;{{$job->type}}
                        </span>

                </td>
                <td><i class="icon fas fa-2x fa-map-marker-alt"></i>&nbsp;Address: {{$job->address}}</td>
                <td><i class="icon fas fa-2x fa-globe-asia"></i>&nbsp;Date: {{$job->created_at->diffForHumans()}}</td>
                <td>
                    @php
                    $user = auth()->user();
                    @endphp
                    <div class="btn-group">
                        @auth
                            @if ($user->isSeeker() && !$job->isApplied())
                                <a href="{{route('jobs.show', $job->slug)}}" class="btn btn-sm btn-success">Apply</a>
                            @endif
                        @if ($user->isEmployer())
                            <a href="{{route('jobs.edit', $job->slug)}}" class="btn btn-sm btn-primary">Edit</a>
                        @endif
                            @if($user->isEmployer() && $job->user_id == $user->id)
                                    <a href="{{route('companies.applicant', $job->slug)}}" class="btn btn-sm btn-dark">Applicants</a>
                                @endif
                        @endauth
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@if(isset($companies))
<a href="{{route('jobs.get-all-job')}}" class="btn btn-success w-100 d-block">Browse all jobs</a>
<div class="mt-4">
    <h2>
        Featured company
    </h2>
    <div class="companies">
        <div class="row">
            @forelse($companies as $company)
                <div class="card col-md-3 col-12" style="width: 18rem;">
                    @if (Storage::exists($company->logo))
                        <img src="{{Storage::url($company->logo)}}" class="card-img-top" alt="{{$company->name}}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$company->name}}</h5>
                        <p class="card-text">
                            {{$company->description}}
                        </p>
                        <a href="{{route('companies.show', $company->slug)}}" class="btn btn-primary">Visit company</a>
                    </div>
                </div>
            @empty
            @endforelse
        </div>

    </div>
</div>
@endif

@section('style')
    <style>
        .icon{
            color: #3f9ae5;
        }
    </style>
@endsection
