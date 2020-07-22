<?php


namespace App\Services;

use App\Jobs\ConvertStoredVideoToMp4;
use FFMpeg\Format\Video\Ogg;
use FFMpeg\Format\Video\WMV;
use FFMpeg\Format\Video\X264;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class VideoConvertService
{
    public function convertVideoToMp4($videoPath, $videoName, $directoryName)
    {
        ConvertStoredVideoToMp4::dispatch($videoPath, $videoName, $directoryName);
    }
}
