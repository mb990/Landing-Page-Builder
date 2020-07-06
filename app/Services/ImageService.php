<?php


namespace App\Services;


use App\Repositories\ImageRepository;

class ImageService
{
    /**
     * @var ImageRepository
     */
    private $image;

    public function __construct(ImageRepository $image)
    {
        $this->image = $image;
    }

    public function find($id)
    {
        return $this->image->find($id);
    }

    public function store($request)
    {
        return $this->image->store($request);
    }

    public function update($request, $id)
    {
        return $this->image->update($request, $id);
    }

    public function delete($id)
    {
        return $this->image->delete($id);
    }
}
