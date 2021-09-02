<!-- Modal -->
<div class="modal fade" id="job-email" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sent job to your friend</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('jobs.sent-to-friend') }}">
                    @csrf
                    <input type="hidden" name="jobSlug" value="{{$job->slug}}">
                    @guest
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Your name</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control @error('email') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="email" autofocus>

{{--                            @error('email')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label">Your email</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

{{--                            @error('email')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
                        </div>
                    </div>
                    @endguest

                    <div class="form-group row">
                        <label for="person-name" class="col-md-4 col-form-label">Person name</label>

                        <div class="col-md-8">
                            <input id="person-name" type="text" class="form-control @error('person-name') is-invalid @enderror" name="namePerson" value="{{ old('person-name') }}" required autocomplete="email" autofocus>

                            {{--                            @error('email')--}}
                            {{--                            <span class="invalid-feedback" role="alert">--}}
                            {{--                                        <strong>{{ $message }}</strong>--}}
                            {{--                                    </span>--}}
                            {{--                            @enderror--}}
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="person-email" class="col-md-4 col-form-label">Person email</label>

                        <div class="col-md-8">
                            <input id="person-email" type="email" class="form-control @error('person-email') is-invalid @enderror" name="emailPerson" value="{{ old('person-email') }}" required autocomplete="email" autofocus>

                            {{--                            @error('email')--}}
                            {{--                            <span class="invalid-feedback" role="alert">--}}
                            {{--                                        <strong>{{ $message }}</strong>--}}
                            {{--                                    </span>--}}
                            {{--                            @enderror--}}
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                               Mail this job
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
