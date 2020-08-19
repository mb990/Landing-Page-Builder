<?php


namespace App\Services;


use App\Repositories\GalleryImageItemRepository;

/**
 * Class GalleryImageItemService
 * @package App\Services
 */
class GalleryImageItemService
{
    /**
     * @var GalleryImageItemRepository
     */
    private $galleryImageItem;

    /**
     * GalleryImageItemService constructor.
     * @param GalleryImageItemRepository $galleryImageItem
     */
    public function __construct(GalleryImageItemRepository $galleryImageItem)
    {
        $this->galleryImageItem = $galleryImageItem;
    }

    /**
     * @return \App\GalleryImageItem[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->galleryImageItem->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->galleryImageItem->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->galleryImageItem->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->galleryImageItem->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->galleryImageItem->delete($id);
    }
}
