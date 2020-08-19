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
     * @var PageElementService
     */
    private $pageElementService;

    /**
     * HeroSectionSettingsService constructor.
     * @param HeroSectionSettingsRepository $heroSectionSettings
     * @param PageElementService $pageElementService
     */
    public function __construct(HeroSectionSettingsRepository $heroSectionSettings, PageElementService $pageElementService)
    {
        $this->heroSectionSettings = $heroSectionSettings;
        $this->pageElementService = $pageElementService;
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
        $settingsId = $this->pageElementService->find($id)->pageElementable->id;

        return $this->heroSectionSettings->update($request, $settingsId);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->heroSectionSettings->delete($id);
    }
}
