<?php


namespace App\Services;


use App\Repositories\GalleryVideoItemRepository;

class GalleryVideoItemService
{
    /**
     * @var GalleryVideoItemRepository
     */
    private $galleryVideoItem;
    /**
     * @var StorageService
     */
    private $storageService;

    public function __construct(GalleryVideoItemRepository $galleryVideoItem, StorageService $storageService)
    {
        $this->galleryVideoItem = $galleryVideoItem;
        $this->storageService = $storageService;
    }

    public function all()
    {
        return $this->galleryVideoItem->all();
    }

    public function find($id)
    {
        return $this->galleryVideoItem->find($id);
    }

    public function store($request)
    {
        $data = $this->storageService->storeVideo($request);

        $storingData = $this->prepareStoringData($request);

        return $this->galleryVideoItem->store($storingData);
    }

    public function update($request, $id)
    {
        return $this->galleryVideoItem->update($request, $id);
    }

    public function delete($id)
    {
        return $this->galleryVideoItem->delete($id);
    }

    public function prepareStoringData($request)
    {
        $data = [];

        $data['filename'] = $request->video_name;

        $data['gallery_settings_id'] = $request->gallery_settings_id;

        $data['blade_file'] = $request->blade_file;

        return $data;
    }
}
