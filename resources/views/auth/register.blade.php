@extends('layouts.app-new')

@section('content')
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-8">
                <h2 class="mb-4">
                    Seeker Registration
                </h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" name="user_type" value="seeker">
                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label">{{ __('Name') }}</label>

                        <div class="col-md-9">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label ">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-9">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label ">{{ __('Date of birth') }}</label>

                        <div class="col-md-9">
                            <input id="date_picker" type="text" class="form-control @error('dob') is-invalid @enderror"
                                   name="dob" value="{{ old('dob') }}" required autocomplete="dob">

                            @error('dob')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-3 col-form-label">{{ __('Password') }}</label>

                        <div class="col-md-9">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                               class="col-md-3 col-form-label">{{ __('Confirm Password') }}</label>

                        <div class="col-md-9">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-md-3 col-form-label ">{{ __('Gender') }}</label>

                        <div class="col-md-9">
                            <label for="">Male</label>
                            <input value="male" type="radio" class="@error('gender') is-invalid @enderror" name="gender"
                                   required autocomplete="new-gender">
                            <label for="">Female</label>
                            <input value="female" type="radio" class=" @error('gender') is-invalid @enderror"
                                   name="gender" required autocomplete="new-gender">
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register as seeker') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <div>
                    <h2>More info</h2>
                    <p>
                        Once you create an account a verification link will be sent to your email
                    </p>
                    <a href="" class="btn btn-success">Learn more</a>
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
