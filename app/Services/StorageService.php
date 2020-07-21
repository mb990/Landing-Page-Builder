<?php


namespace App\Services;


use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class StorageService
{
    public function store($request)
    {
        $data = [];

        $image = $request->file('image');

        $name = $request->template_name . '-' . $request->image_name . '.' . $image->getClientOriginalExtension();

        $path = Storage::disk('local')->putFileAs('temporary/' . $request->template_name, $image, $name);

        $data['path'] = $path;

        $data['extension'] = $image->getClientOriginalExtension();

        return $data;
    }

    public function delete()
    {
        //
    }

}
