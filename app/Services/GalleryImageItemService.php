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
     * @var ProjectImageService
     */
    private $projectImageService;

    /**
     * GalleryImageItemService constructor.
     * @param GalleryImageItemRepository $galleryImageItem
     * @param ProjectImageService $projectImageService
     */
    public function __construct(GalleryImageItemRepository $galleryImageItem, ProjectImageService $projectImageService)
    {
        $this->galleryImageItem = $galleryImageItem;
        $this->projectImageService = $projectImageService;
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

    /**
     * @param $id
     * @return mixed
     */
    public function getItemIdByImage($id)
    {
        $imageItemId = $this->projectImageService->find($id)->imageable->id;

        return $imageItemId;
    }
}
