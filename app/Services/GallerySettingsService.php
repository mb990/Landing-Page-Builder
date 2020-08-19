<?php


namespace App\Services;


use App\Repositories\GallerySettingsRepository;

/**
 * Class GallerySettingsService
 * @package App\Services
 */
class GallerySettingsService
{
    /**
     * @var GallerySettingsRepository
     */
    private $gallerySettings;

    /**
     * GallerySettingsService constructor.
     * @param GallerySettingsRepository $gallerySettings
     */
    public function __construct(GallerySettingsRepository $gallerySettings)
    {
        $this->gallerySettings = $gallerySettings;
    }

    /**
     * @return \App\GallerySettings[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->gallerySettings->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->gallerySettings->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->gallerySettings->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->gallerySettings->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->gallerySettings->delete($id);
    }
}
