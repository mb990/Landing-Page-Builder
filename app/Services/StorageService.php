<?php


namespace App\Services;


use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class StorageService
{
    public function store($request)
    {
        $image = $request->file('image');

        $name = $request->template_name . '-' . $request->image_name . '.' . $image->getClientOriginalExtension();

        $path = Storage::disk('local')->putFileAs('temporary/' . $request->template_name, $image, $name);

//        $path = asset('temporary/' . $request->template_name . '/' . $name);

        return $path;

//        if (Storage::disk('public')->exists($path)) {
//
//            return Storage::disk('public')->get($path);
//        }
    }

}
