@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{$job->title}}
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Cover letter</th>
                            <th>Resume</th>
                            </thead>
                            <tbody>
                            @forelse ($job->usersApplied as $applicant)
                                <tr>
                                    <td>
                                        {{$applicant->name}}
                                    </td>
                                    <td>
                                        <img src="{{Storage::url($applicant->profile->avatar)}}" style="width:100px" alt="">
                                    </td>
                                    <td>
                                        {{$applicant->profile->address}}
                                    </td>
                                    <td>
                                        {{$applicant->profile->phone}}
                                    </td>
                                    <td>
                                        {{$applicant->profile->gender}}
                                    </td>
                                    <td>
                                        <a href="{{Storage::url($applicant->profile->cover_letter)}}" download>Cover letter</a>
                                    </td>
                                    <td>
                                        <a href="{{Storage::url($applicant->profile->resume)}}" download>Resume</a>
                                    </td>
                                </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="7"> No data</td>
                                    </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
