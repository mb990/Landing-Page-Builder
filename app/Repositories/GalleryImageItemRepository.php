<?php


namespace App\Repositories;


use App\GalleryImageItem;

class GalleryImageItemRepository
{
    /**
     * @var GalleryImageItem
     */
    private $galleryImageItem;

    public function __construct(GalleryImageItem $galleryImageItem)
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
        return $this->galleryImageItem->create($request->all());
    }

    public function update($request, $id)
    {
        return $this->find($id)->update($request->all());
    }

    public function delete($id)
    {
        $this->find($id)->delete();
    }
}
