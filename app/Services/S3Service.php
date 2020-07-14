<?php


namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class S3Service
{

    public function storeTemplateImage($request)
    {
        $image = $request->file('image')->storeAs('templates/' . $request->template_name, $request->image_name . '.' . $request->file('image')->getClientOriginalExtension(), 's3');

        return $image;
    }

    public function showTemplateImage($template, $image, $minutes)
    {
        $url = Storage::disk('s3')->temporaryUrl('templates/' . $template->name . '/' . $image->filename, Carbon::now()->addMinutes($minutes));

        return $url;
    }
}
