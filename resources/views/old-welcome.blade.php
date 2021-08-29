@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Recent Jobs</h1>
            <search-job></search-job>
        </div>
      <div class="col-12">
          @include('components.list-job')
      </div>
    </div>
</div>
@endsection


