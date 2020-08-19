<?php


namespace App\Repositories;


use App\GalleryImageItem;

/**
 * Class GalleryImageItemRepository
 * @package App\Repositories
 */
class GalleryImageItemRepository
{
    /**
     * @var GalleryImageItem
     */
    private $galleryImageItem;

    /**
     * GalleryImageItemRepository constructor.
     * @param GalleryImageItem $galleryImageItem
     */
    public function __construct(GalleryImageItem $galleryImageItem)
    {
        $this->galleryImageItem = $galleryImageItem;
    }

    /**
     * @return GalleryImageItem[]|\Illuminate\Database\Eloquent\Collection
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
        return $this->galleryImageItem->create($request->all());
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->find($id)->update($request->all());
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->find($id)->delete();
    }
}
