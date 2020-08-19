<?php


namespace App\Services;


use App\Repositories\ImageRepository;

/**
 * Class TemplateImageService
 * @package App\Services
 */
class TemplateImageService
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
     * TemplateImageService constructor.
     * @param ImageRepository $image
     * @param S3Service $s3Service
     * @param StorageService $storageService
     */
    public function __construct(ImageRepository $image, S3Service $s3Service, StorageService $storageService)
    {
        $this->image = $image;
        $this->s3Service = $s3Service;
        $this->storageService = $storageService;
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
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        $data = $this->storageService->storeTemplateImage($request);

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
        return $this->image->delete($id);
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
