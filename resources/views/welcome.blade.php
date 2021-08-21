@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>Recent Jobs</h1>
     @include('components.list-job')
    </div>
</div>
@endsection


