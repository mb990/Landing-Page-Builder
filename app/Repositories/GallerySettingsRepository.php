<?php


namespace App\Repositories;


use App\GallerySettings;

/**
 * Class GallerySettingsRepository
 * @package App\Repositories
 */
class GallerySettingsRepository
{
    /**
     * @var GallerySettings
     */
    private $gallerySettings;

    /**
     * GallerySettingsRepository constructor.
     * @param GallerySettings $gallerySettings
     */
    public function __construct(GallerySettings $gallerySettings)
    {
        $this->gallerySettings = $gallerySettings;
    }

    /**
     * @return GallerySettings[]|\Illuminate\Database\Eloquent\Collection
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
        return $this->gallerySettings->create($request->all());
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
