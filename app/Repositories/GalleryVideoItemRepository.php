<?php


namespace App\Repositories;


use App\GalleryVideoItem;

/**
 * Class GalleryVideoItemRepository
 * @package App\Repositories
 */
class GalleryVideoItemRepository
{
    /**
     * @var GalleryVideoItem
     */
    private $galleryVideoItem;

    /**
     * GalleryVideoItemRepository constructor.
     * @param GalleryVideoItem $galleryVideoItem
     */
    public function __construct(GalleryVideoItem $galleryVideoItem)
    {
        $this->galleryVideoItem = $galleryVideoItem;
    }

    /**
     * @return GalleryVideoItem[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->galleryVideoItem->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->galleryVideoItem->find($id);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        return $this->galleryVideoItem->create([
            'filename' => $data['filename'],
            'blade_file' => $data['blade_file'],
            'gallery_settings_id' => $data['gallery_settings_id']
            ]);
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
