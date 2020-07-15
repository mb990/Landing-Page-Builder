<?php

use App\Services\PageElementTypeService;
use Illuminate\Database\Seeder;

class PageElementTypeSeeder extends Seeder
{
    /**
     * @var PageElementTypeService
     */
    private $pageElementTypeService;

    public function __construct(PageElementTypeService $pageElementTypeService)
    {
        $this->pageElementTypeService = $pageElementTypeService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Footer', 'Gallery', 'General content section one', 'General content section two', 'General content section three', 'Hero section', 'Newsletter', 'Prices', 'Testimonials', 'Top menu'
        ];

        foreach ($types as $type) {

            $request = new \Illuminate\Http\Request();

            $request->merge(['name' => $type]);

            $this->pageElementTypeService->store($request);
        }
    }
}
