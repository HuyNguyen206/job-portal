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
                    <div class="btn-group">
                        <a href="{{route('jobs.show', $job->slug)}}" class="btn btn-sm btn-success">Apply</a>
                        @auth
                        @if (auth()->user()->user_type === 'employer')
                            <a href="{{route('jobs.edit', $job->slug)}}" class="btn btn-sm btn-primary">Edit</a>
                        @endif
                        @endauth
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@section('style')
    <style>
        .icon{
            color: #3f9ae5;
        }
    </style>
@endsection
