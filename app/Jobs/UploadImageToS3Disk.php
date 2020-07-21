<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class UploadImageToS3Disk implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $imageName;
    private $extension;
    private $imagePath;
    private $storingPath;

    public function __construct($imageName, $extension, $imagePath, $storingPath)
    {
        $this->imageName = $imageName;
        $this->extension = $extension;
        $this->imagePath = $imagePath;
        $this->storingPath = $storingPath;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (Storage::disk('local')->exists($this->imagePath)) {

            try {
                $imageContents = Storage::disk('local')->get($this->imagePath);
            } catch (FileNotFoundException $e) {
            }

            $path = $this->storingPath . '/' . $this->imageName . '.' . $this->extension;

            Storage::disk('s3')->put($path, $imageContents);

            Storage::disk('local')->delete($this->imagePath);
        }
    }
}
