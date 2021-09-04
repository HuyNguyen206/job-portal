@extends('layouts.app-new')

@section('content')
        <div class="row">
            <div class="col-md-2">
                @if ($profile->avatar)
                    <img class="w-100" src="{{Storage::url($profile->avatar)}}" alt="avatar">
                @endif
                <div class="card mt-2">
                    <div class="card-header">
                        Update avatar
                    </div>
                    <div class="card-body">
                        <form action="{{route('profile.avatar')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
                            @error('avatar')
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
                        Update your profile
                    </div>
                    <div class="card-body">
                        <form action="{{route('profile.update')}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address"
                                       value="{{old('address', $profile->address)}}">
                                @error('address')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                       value="{{old('phone', $profile->phone)}}">
                                @error('phone')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Experience</label>
                                <textarea class="form-control @error('experience') is-invalid @enderror" name="experience" id="" cols="30"
                                          rows="10">{{old('experience', $profile->experience)}}</textarea>
                                @error('experience')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Bio</label>
                                <textarea class="form-control @error('bio') is-invalid @enderror" name="bio" id="" cols="30"
                                          rows="10">{{old('bio', $profile->bio)}}</textarea>
                                @error('bio')
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
                        Your information
                    </div>
                    <div class="card-body">
                        <p>
                            Name: {{$profile->user->name}}
                        </p>
                        <p>
                            Email: {{$profile->user->email}}
                        </p>
                        <p>
                            Address: {{$profile->address}}
                        </p>
                        <p>
                            Phone: {{$profile->phone}}
                        </p>
                        <p>
                            Gender: {{$profile->gender}}
                        </p>
                        <p>
                            Experience: {{$profile->experience}}
                        </p>
                        <p>
                            Bio: {{$profile->bio}}
                        </p>
                        <p>
                            Member on: {{$profile->created_at->toFormattedDateString()}}
                        </p>
                        <p>
                            @if ($profile->cover_letter)
                                <a href="{{Storage::url($profile->cover_letter)}}" download>Cover letter</a>
                            @else
                                Please upload cover letter
                            @endif
                        </p>
                        <p>
                            @if ($profile->resume)
                                <a href="{{Storage::url($profile->resume)}}" download>Resume</a>
                            @else
                                Please upload resume
                            @endif
                        </p>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header">
                        Update cover letter
                    </div>
                    <div class="card-body">
                        <form action="{{route('profile.cover-letter')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <input type="file" class="form-control @error('cover_letter') is-invalid @enderror" name="cover_letter">
                            @error('cover_letter')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            <button type="submit" class="btn btn-success mt-2">Update</button>
                        </form>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Update resume
                    </div>
                    <div class="card-body">
                        <form action="{{route('profile.resume')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <input type="file" class="form-control @error('resume') is-invalid @enderror" name="resume">
                            @error('resume')
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
