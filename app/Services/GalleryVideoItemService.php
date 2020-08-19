<?php


namespace App\Services;


use App\Repositories\GalleryVideoItemRepository;

/**
 * Class GalleryVideoItemService
 * @package App\Services
 */
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
    /**
     * @var VideoConvertService
     */
    private $videoConvertService;

    /**
     * GalleryVideoItemService constructor.
     * @param GalleryVideoItemRepository $galleryVideoItem
     * @param StorageService $storageService
     * @param VideoConvertService $videoConvertService
     */
    public function __construct(GalleryVideoItemRepository $galleryVideoItem, StorageService $storageService, VideoConvertService $videoConvertService)
    {
        $this->galleryVideoItem = $galleryVideoItem;
        $this->storageService = $storageService;
        $this->videoConvertService = $videoConvertService;
    }

    /**
     * @return \App\GalleryVideoItem[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->galleryVideoItem->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->galleryVideoItem->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        $data = $this->storageService->storeTemplateVideo($request);

        $videoName = $this->getVideoFileName($request);

        $this->convertVideoToMp4($data['path'], $request, $videoName);

        $storingData = $this->prepareStoringData($request);

        return $this->galleryVideoItem->store($storingData);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->galleryVideoItem->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->galleryVideoItem->delete($id);
    }

    /**
     * @param $request
     * @return array
     */
    public function prepareStoringData($request)
    {
        $data = [];

        $data['filename'] = $request->video_name;

        $data['gallery_settings_id'] = $request->gallery_settings_id;

        $data['blade_file'] = $request->blade_file;

        return $data;
    }

    /**
     * @param $request
     * @return string|string[]
     */
    public function getVideoFileName($request)
    {
        $videoName = pathinfo($request->video_name, PATHINFO_FILENAME);

        return $videoName;
    }

    /**
     * @param $videoPath
     * @return bool
     */
    public function checkIfVideoIsMp4($videoPath)
    {
        $info = pathinfo($videoPath);

        if ($info['extension'] === 'mp4') {

            return true;
        }

        return false;
    }

    /**
     * @param $videoPath
     * @param $request
     * @param $videoName
     */
    public function convertVideoToMp4($videoPath, $request, $videoName)
    {
//        if (!$this->checkIfVideoIsMp4($videoPath)) {

            $this->videoConvertService->convertTemplateVideoToMp4($videoPath, $videoName, $request->template_name);
//        }
    }
}
