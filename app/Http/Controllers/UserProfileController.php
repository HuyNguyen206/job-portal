<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadFileTrait;
use App\Models\Job;
use Carbon\Carbon;

class UserProfileController extends Controller
{
    use UploadFileTrait;

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'check-permission:seeker']);
    }
    //
    public function show(){
        $profile = auth()->user()->profile;
        return view('profile.show', compact('profile'));
    }

    public function update(){
        request()->validate([
            'address' => 'required',
            'phone' => 'required|min:8',
            'bio' => 'required',
            'experience' => 'required'

        ]);
        try {
            auth()->user()->profile->update(\request()->all());
        }catch (\Throwable $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
       return redirect()->back()->with('success', 'Update successfully');

    }

    public function updateCoverLetter(){
        request()->validate([
            'cover_letter' => 'required|mimes:pdf,doc,docx|file|max:10000'
        ]);
        try {
            $this->updateFile('cover_letter');

        }catch (\Throwable $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
        return redirect()->back()->with('success', 'Update cover letter successfully');
    }

    public function updateResume(){
        request()->validate([
            'resume' => 'required|mimes:pdf,doc,docx|file|max:10000'
        ]);
        try {
            $this->updateFile('resume');

        }catch (\Throwable $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
        return redirect()->back()->with('success', 'Update resume successfully');
    }
    public function updateAvatar(){
        request()->validate([
            'avatar' => 'required|image|file|max:10000'
        ]);
        try {
            $this->updateFile('avatar');

        }catch (\Throwable $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
        return redirect()->back()->with('success', 'Update avatar successfully');
    }

    public function applyJob(Job $job){
        try {
            auth()->user()->jobsApplied()->attach($job);
        }catch (\Throwable $ex){
            return response()->json(['success' => false, 'message' => $ex->getMessage()], 500);
        }
        return response()->json(['success' => true, 'message' => 'Apply successfully']);
    }

    public function toogleFavotiteJob(Job $job){
        try {
            $currentUser = auth()->user();
            $isSave = $job->isSaveByUserAlready($currentUser);
            $job->usersFavorite()->toggle($currentUser);
            $message = $isSave ? 'UnSave' : 'Save';
        }catch (\Throwable $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()], 500);
        }
        return response()->json(['success' => true, 'message' => "$message successfully"]);
    }

    public function getSavedJobs()
    {
        return view('jobs.favorite-job')->withJobs(auth()->user()->jobsFavorite);
    }

}
