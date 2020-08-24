<?php


namespace App\Services;


use App\Repositories\ImageRepository;

/**
 * Class ProjectImageService
 * @package App\Services
 */
class ProjectImageService
{
    /**
     * @var ImageRepository
     */
    private $image;
    /**
     * @var S3Service
     */
    private $s3Service;
    /**
     * @var StorageService
     */
    private $storageService;
    /**
     * @var PageElementService
     */
    private $pageElementService;

    /**
     * ProjectImageService constructor.
     * @param ImageRepository $image
     * @param S3Service $s3Service
     * @param StorageService $storageService
     * @param PageElementService $pageElementService
     */
    public function __construct(ImageRepository $image, S3Service $s3Service, StorageService $storageService, PageElementService $pageElementService)
    {
        $this->image = $image;
        $this->s3Service = $s3Service;
        $this->storageService = $storageService;
        $this->pageElementService = $pageElementService;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->image->find($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findWithImageable($id)
    {
        return $this->image->findWithImageable($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        $data = $this->storageService->storeProjectImage($request);

        $this->s3Service->storeImage($request->image_name, $data['extension'], $data['path'], $request->storing_path);

        $savingData = $this->prepareStoringData($request);

        return $this->image->store($savingData);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->image->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
//        $element = $this->pageElementService->findElementByImage($this->find($id));

        $imagePath = $this->pageElementService->getSingleImagePathFromMultipleImagesElement($this->findWithImageable($id)->imageable);

        $this->s3Service->deleteImageItem($imagePath);

        return $this->image->delete($id);
    }

    public function deleteOnlyS3ItemImage($id)
    {
        $imagePath = $this->pageElementService->getSingleImagePathFromMultipleImagesElement($this->findWithImageable($id)->imageable);

        $this->s3Service->deleteImageItem($imagePath);
    }

    /**
     * @param $request
     * @return array
     */
    public function prepareStoringData($request)
    {
        $data = [];

        $data['filename'] = $request->image_name . '.' . $request->file('image')->getClientOriginalExtension();

        $data['imageable_type'] = $request->imageable_type;

        $data['imageable_id'] = $request->imageable_id;

        return $data;
    }


}
