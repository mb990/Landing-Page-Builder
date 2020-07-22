<?php


namespace App\Services;

use App\Jobs\ConvertStoredVideoToMp4;

class VideoConvertService
{
    public function convertVideoToMp4($videoPath, $videoName, $directoryName)
    {
        ConvertStoredVideoToMp4::dispatch($videoPath, $videoName, $directoryName);
    }
}
