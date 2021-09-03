<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadFileTrait {

    public function updateFile($type, $typeObject = 'profile', $user = null, $objectWithImage = null){
        $user = $user ?? auth()->user();
        $dataType = \request()->file($type);
        $extension = $dataType->getClientOriginalExtension();
        $path = $dataType->storeAs($type,Str::of($dataType->getClientOriginalName())->basename('.'.$extension).'_'.Str::uuid().'.'.$extension);
        $object = $objectWithImage ?? $user->$typeObject;
        if(Storage::exists($object->$type)){
            Storage::delete($object->$type);
        }
        $object->update([
            $type =>  $path
        ]);
    }
}
