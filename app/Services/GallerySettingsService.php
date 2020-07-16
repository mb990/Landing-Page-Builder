<?php


namespace App\Services;


use App\Repositories\GallerySettingsRepository;

class GallerySettingsService
{
    /**
     * @var GallerySettingsRepository
     */
    private $gallerySettings;

    public function __construct(GallerySettingsRepository $gallerySettings)
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
        return $this->gallerySettings->store($request);
    }

    public function update($request, $id)
    {
        return $this->gallerySettings->update($request, $id);
    }

    public function delete($id)
    {
        return $this->gallerySettings->delete($id);
    }
}
