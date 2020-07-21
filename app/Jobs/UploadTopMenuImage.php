<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
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

    public function __construct($templateName, $imageName, $imagePath)
    {
        $this->imagePath = $imagePath;
        $this->templateName = $templateName;
        $this->imageName = $imageName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        $image = Storage::disk('public')->get($this->imagePath);
//
//        $image->storeAs('templates/' . $this->templateName, $this->imageName . '.' . $image->getClientOriginalExtension(), 's3');
    }
}
