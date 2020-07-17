<?php


namespace App\Services;


use App\Repositories\GalleryVideoItemRepository;

class GalleryVideoItemService
{
    /**
     * @var GalleryVideoItemRepository
     */
    private $galleryVideoItem;

    public function __construct(GalleryVideoItemRepository $galleryVideoItem)
    {
        $this->galleryVideoItem = $galleryVideoItem;
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
        return $this->galleryVideoItem->store($request);
    }

    public function update($request, $id)
    {
        return $this->galleryVideoItem->update($request, $id);
    }

    public function delete($id)
    {
        return $this->galleryVideoItem->delete($id);
    }
}
