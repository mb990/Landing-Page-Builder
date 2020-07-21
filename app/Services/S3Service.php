<?php


namespace App\Services;

use App\Jobs\UploadImageToS3Disk;
use Carbon\Carbon;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class S3Service
{

    public function storeImage($imageName, $extension, $imagePath, $storingPath)
    {
        UploadImageToS3Disk::dispatch($imageName, $extension, $imagePath, $storingPath)->delay(Carbon::now()->addSeconds(5));
    }

    public function showTemplateTopMenuImage($template, $image, $minutes)
    {
        $url = Storage::disk('s3')->temporaryUrl('templates/' . $template->name . '/' . $image->filename, Carbon::now()->addMinutes($minutes));

        return $url;
    }

    public function showTemplateTestimonialImage($template, $image, $minutes)
    {
        $url = Storage::disk('s3')->temporaryUrl('templates/' . $template->name . '/testimonials/' . $image->filename, Carbon::now()->addMinutes($minutes));

        return $url;
    }

    public function showTemplateHeroSectionImage($template, $image, $minutes)
    {
        $url = Storage::disk('s3')->temporaryUrl('templates/' . $template->name . '/' . $image->filename, Carbon::now()->addMinutes($minutes));

        return $url;
    }

    public function showTemplateGeneralContentOneImage($template, $image, $minutes)
    {
        $url = Storage::disk('s3')->temporaryUrl('templates/' . $template->name . '/' . $image->filename, Carbon::now()->addMinutes($minutes));

        return $url;
    }

    public function showTemplateGeneralContentTwoImage($template, $image, $minutes)
    {
        $url = Storage::disk('s3')->temporaryUrl('templates/' . $template->name . '/' . $image->filename, Carbon::now()->addMinutes($minutes));

        return $url;
    }

    public function showTemplateGalleryImageItemImage($template, $image, $minutes)
    {
        $url = Storage::disk('s3')->temporaryUrl('templates/' . $template->name . '/gallery/images/' . $image->filename, Carbon::now()->addMinutes($minutes));

        return $url;
    }
}
