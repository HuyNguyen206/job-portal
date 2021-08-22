@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit job
                </div>
                <div class="card-body">
                    <form action="{{route('jobs.update', $job->slug)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror"  value="{{old('title', $job->title)}}">
                            @error('title')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="5" class="form-control  @error('description') is-invalid @enderror">{{old('description', $job->description)}}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <textarea name="roles" id="" cols="30" rows="5" class="form-control  @error('roles') is-invalid @enderror">{{old('roles', $job->roles)}}</textarea>
                            @error('roles')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select  id="" name="category_id" class="form-control  @error('category_id') is-invalid @enderror">
                                <option value="0" disabled>--Select Category--</option>
                                @foreach($categories as $category)
                                    <option @if(old('category_id', $job->category_id) == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Position</label>
                            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{old('position', $job->position)}}">
                            @error('position')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address', $job->address)}}">
                            @error('address')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Type</label>
                            <select class="form-control @error('type') is-invalid @enderror" name="type">
                                <option value="0" disabled>--Select type--</option>
                                <option @if (old('type', $job->type) == 'fulltime') selected @endif value="fulltime">Full time</option>
                                <option @if (old('type', $job->type) == 'parttime') selected @endif value="parttime">Part time</option>
                                <option @if (old('type', $job->type) == 'casual') selected @endif value="casual">Casual</option>
                            </select>
                            @error('type')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                                <option value="0" disabled>--Select status--</option>
                                <option @if (old('status', $job->status) == '1') selected @endif value="1">Live</option>
                                <option @if (old('status', $job->status) == '0') selected @endif value="0">Draft</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Last date</label>
                            <input type="text" name="last_date" id="date_picker" class="form-control @error('last_date') is-invalid @enderror" value="{{old('last_date', $job->last_date)}}">
                            @error('last_date')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('js')
    @include('jobs.component.date-picker')
@endsection
