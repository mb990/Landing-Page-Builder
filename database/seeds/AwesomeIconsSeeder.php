<?php

use Illuminate\Database\Seeder;

/**
 * Class AwesomeIconsSeeder
 */
class AwesomeIconsSeeder extends Seeder
{
    /**
     * @var \App\Services\AwesomeIconsService
     */
    private $awesomeIconsService;

    /**
     * AwesomeIconsSeeder constructor.
     * @param \App\Services\AwesomeIconsService $awesomeIconsService
     */
    public function __construct(\App\Services\AwesomeIconsService $awesomeIconsService)
    {
        $this->awesomeIconsService = $awesomeIconsService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $awesomeIcons = [
            'address-book', 'android', 'bicycle', 'bluetooth-b', 'camera', 'calendar', 'calculator', 'certificate', 'chain', 'cloud-upload', 'cloud-download', 'credit-card', 'file-text-o', 'google',
            'facebook-f', 'folder-open-o', 'folder-open', 'id-card-o', 'id-card', 'map', 'plus', 'windows', 'youtube', 'skype', 'phone', 'music', 'battery-empty', 'battery-full',
        ];

        foreach ($awesomeIcons as $awesomeIcon) {

            $request = new \Illuminate\Http\Request();

            $request->merge(['name' => $awesomeIcon]);

            $this->awesomeIconsService->store($request);
        }
    }
}
