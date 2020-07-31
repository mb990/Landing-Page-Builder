<?php


namespace App\Services;

use App\Jobs\ConvertStoredProjectVideoToMp4;
use App\Jobs\ConvertStoredTemplateVideoToMp4;

class VideoConvertService
{
    public function convertTemplateVideoToMp4($videoPath, $videoName, $directoryName)
    {
        ConvertStoredTemplateVideoToMp4::dispatch($videoPath, $videoName, $directoryName);
    }

    public function convertProjectVideoToMp4($videoPath, $videoName, $directoryName)
    {
        ConvertStoredProjectVideoToMp4::dispatch($videoPath, $videoName, $directoryName);
    }
}
