<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class UploadTopMenuImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $imagePath;
    private $templateName;
    private $imageName;
    private $extension;

    public function __construct($templateName, $imageName, $extension, $imagePath)
    {
        $this->imagePath = $imagePath;
        $this->templateName = $templateName;
        $this->imageName = $imageName;
        $this->extension = $extension;
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
                $image = Storage::disk('local')->get($this->imagePath);
            } catch (FileNotFoundException $e) {
            }

            $path = 'templates/' . $this->templateName . '/' . $this->imageName . '.' . $this->extension;

            Storage::disk('s3')->put($path, $image);
        }
    }
}
