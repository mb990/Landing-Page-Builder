<?php


namespace App\Services;


use App\Repositories\HeroSectionSettingsRepository;

class HeroSectionSettingsService
{
    /**
     * @var HeroSectionSettingsRepository
     */
    private $heroSectionSettings;

    public function __construct(HeroSectionSettingsRepository $heroSectionSettings)
    {
        $this->heroSectionSettings = $heroSectionSettings;
    }

    public function all()
    {
        return $this->heroSectionSettings->all();
    }

    public function find($id)
    {
        return $this->heroSectionSettings->find($id);
    }

    public function store($request)
    {
        return $this->heroSectionSettings->store($request);
    }

    public function update($request, $id)
    {
        return $this->heroSectionSettings->update($request, $id);
    }

    public function delete($id)
    {
        return $this->heroSectionSettings->delete($id);
    }
}
