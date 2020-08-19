<?php


namespace App\Services;


use App\Repositories\HeroSectionSettingsRepository;

/**
 * Class HeroSectionSettingsService
 * @package App\Services
 */
class HeroSectionSettingsService
{
    /**
     * @var HeroSectionSettingsRepository
     */
    private $heroSectionSettings;

    /**
     * HeroSectionSettingsService constructor.
     * @param HeroSectionSettingsRepository $heroSectionSettings
     */
    public function __construct(HeroSectionSettingsRepository $heroSectionSettings)
    {
        $this->heroSectionSettings = $heroSectionSettings;
    }

    /**
     * @return \App\HeroSectionSettings[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->heroSectionSettings->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->heroSectionSettings->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->heroSectionSettings->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->heroSectionSettings->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->heroSectionSettings->delete($id);
    }
}
