<?php


namespace App\Services;


use App\Repositories\GalleryImageItemRepository;

class GalleryImageItemService
{
    /**
     * @var GalleryImageItemRepository
     */
    private $galleryImageItem;

    public function __construct(GalleryImageItemRepository $galleryImageItem)
    {
        $this->galleryImageItem = $galleryImageItem;
    }

    public function all()
    {
        return $this->galleryImageItem->all();
    }

    public function find($id)
    {
        return $this->galleryImageItem->find($id);
    }

    public function store($request)
    {
        return $this->galleryImageItem->store($request);
    }

    public function update($request, $id)
    {
        return $this->galleryImageItem->update($request, $id);
    }

    public function delete($id)
    {
        return $this->galleryImageItem->delete($id);
    }
}
