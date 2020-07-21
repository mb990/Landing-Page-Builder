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

    public function store($data)
    {
        return $this->galleryVideoItem->create([
            'filename' => $data['filename'],
            'blade_file' => $data['blade_file'],
            'gallery_settings_id' => $data['gallery_settings_id']
            ]);
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
