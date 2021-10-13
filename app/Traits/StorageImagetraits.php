<?php
namespace Illuminate\Auth\Access;
namespace App\Traits;

use Illuminate\Support\Facades\Storage;


trait StorageImagetraits{
    public function storageTraitUpload($request,$fieldName,$foderName){
        if($request->hasFile($fieldName)){
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str_random(20).'.'.$file->getClientOriginalExtension();
            $filePath = $request->file('feature_image_path')->storeAs('public/'.$foderName.'/'.auth()->id(),$fileNameHash);
            $dataUploadTrait =[
                'file_name' =>$fileNameOrigin,
                'file_path' =>Storage::url($filePath)

            ];
            return $dataUploadTrait;
        }

     return null;
    }
}
