@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2">
            @if ($company->logo)
                <img class="w-100" src="{{Storage::url($company->logo)}}" alt="logo">
            @endif
            <div class="card mt-2">
                <div class="card-header">
                    Update logo
                </div>
                <div class="card-body">
                    <form action="{{route('companies.logo', $company->slug)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">
                        @error('logo')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                        <button type="submit" class="btn btn-success mt-2">Update</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Update company profile
                </div>
                <div class="card-body">
                    <form action="{{route('companies.update', $company->slug)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                                   value="{{old('name', $company->name)}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address"
                                   value="{{old('address', $company->address)}}">
                            @error('address')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                   value="{{old('phone', $company->phone)}}">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Website</label>
                            <input type="text" class="form-control @error('website') is-invalid @enderror" name="website"
                                   value="{{old('website', $company->website)}}">
                            @error('website')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Slogan</label>
                            <input type="text" class="form-control @error('slogan') is-invalid @enderror" name="slogan"
                                   value="{{old('slogan', $company->slogan)}}">
                            @error('slogan')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" cols="30" rows="10">{{old('description', $company->description)}}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-header">
                    Company information
                </div>
                <div class="card-body">
                    <p>
                        Name: {{$company->name}}
                    </p>
                    <p>
                        Address: {{$company->address}}
                    </p>
                    <p>
                        Phone: {{$company->phone}}
                    </p>
                    <p>
                        Website: {{$company->gender}}
                    </p>
                    <p>
                        Slogan: {{$company->experience}}
                    </p>
                    <p>
                        Description: {{$company->bio}}
                    </p>

                </div>
            </div>
            @if ($company->cover_photo)
            <img src="{{Storage::url($company->cover_photo)}}" class="w-100" alt="">
            @endif
            <div class="card mt-2">
                <div class="card-header">
                    Update cover photo
                </div>
                <div class="card-body">
                    <form action="{{route('companies.cover-photo', $company->slug)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <input type="file" class="form-control @error('cover_photo') is-invalid @enderror" name="cover_photo">
                        @error('cover_photo')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                        <button type="submit" class="btn btn-success mt-2">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
