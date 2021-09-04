@extends('layouts.app-new')

@section('content')
        <div class="row">
            <h1>
                @php
                $user = auth()->user();
                @endphp
                {{$user->user_type === 'seeker' ? $user->name : $user->company->name}}'s jobs
            </h1>
            @include('components.list-job')
        </div>
@endsection
