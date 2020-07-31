<?php


namespace App\Services;


use App\Repositories\GalleryVideoItemRepository;

class ProjectGalleryVideoItemService
{
    /**
     * @var GalleryVideoItemRepository
     */
    private $galleryVideoItem;
    /**
     * @var StorageService
     */
    private $storageService;
    /**
     * @var VideoConvertService
     */
    private $videoConvertService;

    public function __construct(GalleryVideoItemRepository $galleryVideoItem, StorageService $storageService, VideoConvertService $videoConvertService)
    {
        $this->galleryVideoItem = $galleryVideoItem;
        $this->storageService = $storageService;
        $this->videoConvertService = $videoConvertService;
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
        $data = $this->storageService->storeProjectVideo($request);

        $videoName = $this->getVideoFileName($request);

        $this->convertVideoToMp4($data['path'], $request, $videoName);

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

    public function getVideoFileName($request)
    {
        $videoName = pathinfo($request->video_name, PATHINFO_FILENAME);

        return $videoName;
    }

    public function checkIfVideoIsMp4($videoPath)
    {
        $info = pathinfo($videoPath);

        if ($info['extension'] === 'mp4') {

            return true;
        }

        return false;
    }

    public function convertVideoToMp4($videoPath, $request, $videoName)
    {
//        if (!$this->checkIfVideoIsMp4($videoPath)) {

        $this->videoConvertService->convertProjectVideoToMp4($videoPath, $videoName, $request->storing_path);
//        }
    }
}
