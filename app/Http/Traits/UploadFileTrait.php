<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadFileTrait {

    public function updateFile($type){
        $coverLetter = \request()->file($type);
        $extension = $coverLetter->getClientOriginalExtension();
        $path = $coverLetter->storeAs($type,Str::of($coverLetter->getClientOriginalName())->basename('.'.$extension).'_'.Str::uuid().'.'.$extension);
        $profile = auth()->user()->profile;
        if(Storage::exists($profile->$type)){
            Storage::delete($profile->$type);
        }
        $profile->update([
            $type =>  $path
        ]);
    }
}
