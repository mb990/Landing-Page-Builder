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

    public function __construct(ImageRepository $image, S3Service $s3Service)
    {
        $this->image = $image;
        $this->s3Service = $s3Service;
    }

    public function find($id)
    {
        return $this->image->find($id);
    }

    public function store($request)
    {
        if ($request->imageable_type === 'App\\TopMenuSettings' || $request->imageable_type === 'App\\HeroSectionSettings') {

            $image = $this->s3Service->storeTemplateTopMenuImage($request);
        }

        else if ($request->imageable_type === 'App\\TestimonialSettings') {

            $image = $this->s3Service->storeTemplateTestimonialImage($request);
        }

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

    public function prepareStoringData($image, $request)
    {
        $data = [];

        $data['filename'] = basename($image);

        $data['url'] = Storage::disk('s3')->url($image);

        $data['imageable_type'] = $request->imageable_type;

        $data['imageable_id'] = $request->imageable_id;

        return $data;
    }
}
