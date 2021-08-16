@if ($message = session('success'))
    <div class="alert alert-success">
        {{$message}}
    </div>
@endif
@if ($message = session('error'))
    <div class="alert alert-danger">
        {{$message}}
    </div>
@endif
