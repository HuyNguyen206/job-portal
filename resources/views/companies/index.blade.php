@extends('layouts.app-new')

@section('content')
    <div class="container my-2">
        <div class="row">
            <div class="col-md-12">
                <h2>All company</h2>
            </div>
        </div>
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
        <div class="row">
                <div class="mx-auto mt-2 ">
                    {{$companies->links()}}
                </div>
        </div>
    </div>

@endsection
