<?php

namespace App\Jobs;

use FFMpeg\Format\Video\X264;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class ConvertStoredProjectVideoToMp4 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $videoPath;
    private $videoName;
    private $directoryName;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($videoPath, $videoName, $directoryName)
    {
        $this->videoPath = $videoPath;
        $this->videoName = $videoName;
        $this->directoryName = $directoryName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        FFMpeg::FromDisk('local')
            ->open($this->videoPath)
            ->export()
            ->toDisk('s3')
            ->inFormat(new X264('libmp3lame', 'libx264'))
            ->save($this->directoryName . '/' . $this->videoName . '.mp4');

        Storage::disk('local')->delete($this->videoPath);
    }
}
