<?php


namespace App\Services;


use App\Repositories\ImageRepository;
use Illuminate\Support\Facades\Storage;

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

    public function __construct(ImageRepository $image, S3Service $s3Service, StorageService $storageService)
    {
        $this->image = $image;
        $this->s3Service = $s3Service;
        $this->storageService = $storageService;
    }

    public function find($id)
    {
        return $this->image->find($id);
    }

    public function storeTopMenuImage($request)
    {
        $data = $this->storageService->store($request);

        $this->s3Service->storeTemplateTopMenuImage($request->template_name, $request->image_name, $data['extension'], $data['path']);

        $data = $this->prepareStoringData($request);

        return $this->image->store($data);
    }

    public function storeHeroSectionImage($request)
    {
        $image = $this->s3Service->storeTemplateHeroSectionImage($request);

        $data = $this->prepareStoringData($image, $request);

        return $this->image->store($data);
    }

    public function storeTestimonialImage($request)
    {
        $image = $this->s3Service->storeTemplateTestimonialImage($request);

        $data = $this->prepareStoringData($image, $request);

        return $this->image->store($data);
    }

    public function storeGeneralContentOneImage($request)
    {
        $image = $this->s3Service->storeTemplateGeneralContentOneImage($request);

        $data = $this->prepareStoringData($image, $request);

        return $this->image->store($data);
    }

    public function storeGeneralContentTwoImage($request)
    {
        $image = $this->s3Service->storeTemplateGeneralContentTwoImage($request);

        $data = $this->prepareStoringData($image, $request);

        return $this->image->store($data);
    }

    public function storeGalleryImageItemImage($request)
    {
        $image = $this->s3Service->storeTemplateGalleryImageItemImage($request);

        $data = $this->prepareStoringData($image, $request);

        return $this->image->store($data);
    }

    public function update($request, $id)
    {
        return $this->image->update($request, $id);
    }

    public function delete($id)
    {
        return $this->image->delete($id);
    }

    public function prepareStoringData($request)
    {
        $data = [];

        $data['filename'] = $request->file('image')->getClientOriginalName() . '.' . $request->file('image')->getClientOriginalExtension();

        $data['imageable_type'] = $request->imageable_type;

        $data['imageable_id'] = $request->imageable_id;

        return $data;
    }
}
