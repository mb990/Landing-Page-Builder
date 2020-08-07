<?php


namespace App\Services;


use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class StorageService
{
    public function storeTemplateImage($request)
    {
        $data = [];

        $image = $request->file('image');

        $name = $request->image_name . '.' . $image->getClientOriginalExtension();

        $path = Storage::disk('local')->putFileAs('temporary/' . $request->template_name, $image, $name);

        $data['path'] = $path;

        $data['extension'] = $image->getClientOriginalExtension();

        return $data;
    }

    public function storeTemplateVideo($request)
    {
        $data = [];

        $video = $request->file('video');

        $name = $request->video_name;

        $path = Storage::disk('local')->putFileAs('temporary/' . $request->template_name, $video, $name);

        $data['path'] = $path;

        $data['extension'] = $video->getClientOriginalExtension();

        return $data;
    }

    public function storeProjectImage($request)
    {
        $data = [];

        $image = $request->file('image');

        $name = $request->image_name . '_' . time() . '.' . $image->getClientOriginalExtension();

        $path = Storage::disk('local')->putFileAs('temporary/projects/' . uniqid() . '_' . $request->project_name, $image, $name);

        $data['path'] = $path;

        $data['extension'] = $image->getClientOriginalExtension();

        return $data;
    }

    public function storeProjectVideo($request)
    {
        $data = [];

        $video = $request->file('video');

        $name = $request->video_name . '_' . time();

        $path = Storage::disk('local')->putFileAs('temporary/projects/' . uniqid() . '_' . $request->project_name, $video, $name);

        $data['path'] = $path;

        $data['extension'] = $video->getClientOriginalExtension();

        return $data;
    }

    public function storeAdminNotificationImage($request)
    {
        $data = [];

        $image = $request->file('image');

        $name = $request->image_name . '_' . time() . '.' . $image->getClientOriginalExtension();

        $path = Storage::disk('local')->putFileAs('admin/notifications/' . uniqid(), $image, $name);

        $data['path'] = $path;

        $data['extension'] = $image->getClientOriginalExtension();

        return $data;
    }
}
