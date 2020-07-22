<?php


namespace App\Services;


use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class StorageService
{
    public function storeImage($request)
    {
        $data = [];

        $image = $request->file('image');

        $name = $request->image_name . '.' . $image->getClientOriginalExtension();

        $path = Storage::disk('local')->putFileAs('temporary/' . $request->template_name, $image, $name);

        $data['path'] = $path;

        $data['extension'] = $image->getClientOriginalExtension();

        return $data;
    }

    public function storeVideo($request)
    {
        $data = [];

        $video = $request->file('video');

        $name = $request->video_name;

        $path = Storage::disk('local')->putFileAs('temporary/' . $request->template_name, $video, $name);

        $data['path'] = $path;

        $data['extension'] = $video->getClientOriginalExtension();

        return $data;
    }
}
