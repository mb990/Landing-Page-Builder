<?php


namespace App\Repositories;


use App\GalleryVideoItem;

class GalleryVideoItemRepository
{
    /**
     * @var GalleryVideoItem
     */
    private $galleryVideoItem;

    public function __construct(GalleryVideoItem $galleryVideoItem)
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
        return $this->galleryVideoItem->create($request->all());
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
