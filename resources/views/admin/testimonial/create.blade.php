@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-4">
    @include('admin.partials.left-menu')
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Add new testimonial
            </div>
            <div class="card-body">
                <form action="{{route('testial.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea name="content" id="" cols="30" rows="5" class="form-control @error('content') is-invalid @enderror">{{old('content')}}</textarea>
                        @error('content')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Profession</label>
                        <input type="text" class="form-control @error('profession') is-invalid @enderror" name="profession">
                        @error('profession')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Vimeo video id</label>
                        <input type="text" class="form-control @error('video_id') is-invalid @enderror" name="video_id">
                        @error('video_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
