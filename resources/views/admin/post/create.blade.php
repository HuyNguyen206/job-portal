@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-4">
    @include('admin.partials.left-menu')
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Add new post
            </div>
            <div class="card-body">
                <form action="{{route('dashboard.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text"  class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}">
                        @error('title')
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
                        <label for="">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                        @error('image')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror" id="">
                            <option @if(1 == old('status')) selected @endif value="1">Live</option>
                            <option @if(0 == old('status')) selected @endif value="0">Draft</option>
                        </select>
                        @error('status')
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
