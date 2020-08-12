<?php


namespace App\Services;

use App\Jobs\UploadImageToS3Disk;
use Carbon\Carbon;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class S3Service
{

    /**
     * @param $imageName
     * @param $extension
     * @param $imagePath
     * @param $storingPath
     */
    public function storeImage($imageName, $extension, $imagePath, $storingPath)
    {
        UploadImageToS3Disk::dispatch($imageName, $extension, $imagePath, $storingPath)
//            ->delay(Carbon::now()->addSeconds(2))
        ;
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

    /**
     * @param $template
     * @param $video
     * @param $minutes
     * @return mixed
     */
    public function showGalleryVideo($template, $video, $minutes)
    {
        $videoName = $this->getVideoFileName($video);

        $url = Storage::disk('s3')->temporaryUrl('templates/' . $template->name . '/gallery/videos/' . $videoName . '.mp4', Carbon::now()->addMinutes($minutes));

        return $url;
    }

    /**
     * @param $video
     * @return string|string[]
     */
    public function getVideoFileName($video)
    {
        $videoName = pathinfo($video->filename, PATHINFO_FILENAME);

        return $videoName;
    }

    /**
     * @param $path
     * @param $minutes
     * @return mixed
     */
    public function showProjectImage($path, $minutes)
    {
        $url = Storage::disk('s3')->temporaryUrl($path, Carbon::now()->addMinutes($minutes));

        return $url;
    }

    /**
     * @param $path
     * @param $video
     * @param $minutes
     * @return mixed
     */
    public function showProjectGalleryVideo($path, $video, $minutes)
    {
        $videoName = $this->getVideoFileName($video);

        $url = Storage::disk('s3')->temporaryUrl($path . $videoName . '.mp4', Carbon::now()->addMinutes($minutes));

        return $url;
    }

    /**
     * @param $path
     */
    public function deleteImageItem($path)
    {
        try {
            Storage::disk('s3')->delete($path);
        } catch (\Exception $e) {
        }
    }

    /**
     * @param $path
     */
    public function deleteVideoItem($path)
    {
        try {
            Storage::disk('s3')->delete($path);
        } catch (\Exception $e) {
        }
    }
}
