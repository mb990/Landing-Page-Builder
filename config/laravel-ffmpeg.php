<?php

return [
    'ffmpeg' => [
//        'binaries' => env('FFMPEG_BINARIES', 'ffmpeg'),
        'binaries'  => 'C:/ffmpeg/bin/ffmpeg.exe',
        'threads'  => 12,
    ],

    'ffprobe' => [
//        'binaries' => env('FFPROBE_BINARIES', 'ffprobe'),
        'binaries' => 'C:/ffmpeg/bin/ffprobe.exe',
    ],

    'timeout' => 3600,

    'enable_logging' => true,
];
