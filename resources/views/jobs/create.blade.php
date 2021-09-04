@extends('layouts.app-new')

@section('content')
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
                            <textarea name="roles" id="" cols="30" rows="5" class="form-control  @error('roles') is-invalid @enderror">{{old('roles')}}</textarea>
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
                            <input type="text" name="position" value="{{old('position')}}" class="form-control @error('position') is-invalid @enderror">
                            @error('position')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" value="{{old('address')}}" class="form-control @error('address') is-invalid @enderror">
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
                                <option @if("fulltime" === old('type')) selected @endif value="fulltime">Full time</option>
                                <option @if("parttime" === old('type')) selected @endif value="parttime">Part time</option>
                                <option @if("casual" === old('type')) selected @endif value="casual">Casual</option>
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
                            <label for="">Last date</label>
                            <input type="text" name="last_date" id="date_picker" class="form-control @error('last_date') is-invalid @enderror">
                            @error('last_date')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">No of vacancy</label>
                            <input type="number" name="number_of_vacancy" class="form-control @error('number_of_vacancy') is-invalid @enderror">
                            @error('number_of_vacancy')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Year of Experience</label>
                            <input type="number" name="year_of_experience" class="form-control @error('year_of_experience') is-invalid @enderror">
                            @error('year_of_experience')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                <option value="0" disabled>--Select status--</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('gender')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Salary</label>
                            <select class="form-control @error('salary') is-invalid @enderror" name="salary">
                                <option value="0" disabled>--Select status--</option>
                                <option value="negotiable">Negotiable</option>
                                <option value="2000-5000">2000-5000</option>
                                <option value="50000-10000">50000-10000</option>
                                <option value="10000-20000">10000-20000</option>
                                <option value="30000-50000">30000-50000</option>
                            </select>
                            @error('gender')
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
@endsection

@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('js')
    @include('jobs.component.date-picker')
@endsection
