<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadFileTrait {

    public function updateFile($type, $typeObject = 'profile'){
        $dataType = \request()->file($type);
        $extension = $dataType->getClientOriginalExtension();
        $path = $dataType->storeAs($type,Str::of($dataType->getClientOriginalName())->basename('.'.$extension).'_'.Str::uuid().'.'.$extension);
        $object = auth()->user()->$typeObject;
        if(Storage::exists($object->$type)){
            Storage::delete($object->$type);
        }
        $object->update([
            $type =>  $path
        ]);
    }
}
