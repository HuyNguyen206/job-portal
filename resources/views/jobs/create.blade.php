@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Create job
                </div>
                <div class="card-body">
                    <form action="{{route('jobs.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror"  value="{{old('title')}}">
                            @error('title')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="5" class="form-control  @error('description') is-invalid @enderror">{{old('description')}}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <textarea name="roles" id="" cols="30" rows="5" class="form-control  @error('role') is-invalid @enderror">{{old('role')}}</textarea>
                            @error('role')
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
                                    <option @if(old('category_id') == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
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
                            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror">
                            @error('position')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror">
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
                                <option value="fulltime">Full time</option>
                                <option value="parttime">Part time</option>
                                <option value="casual">Casual</option>
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
                                <option value="1">Live</option>
                                <option value="0">Draft</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Last date</label>
                            <input type="date" name="last_date" class="form-control @error('last_date') is-invalid @enderror">
                            @error('last_date')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
