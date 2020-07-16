<?php


namespace App\Repositories;


use App\GallerySettings;

class GallerySettingsRepository
{
    /**
     * @var GallerySettings
     */
    private $gallerySettings;

    public function __construct(GallerySettings $gallerySettings)
    {
        $this->gallerySettings = $gallerySettings;
    }

    public function all()
    {
        return $this->gallerySettings->all();
    }

    public function find($id)
    {
        return $this->gallerySettings->find($id);
    }

    public function store($request)
    {
        return $this->gallerySettings->create($request->all());
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
