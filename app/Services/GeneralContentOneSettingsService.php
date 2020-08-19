<?php


namespace App\Services;


use App\Repositories\GeneralContentOneSettingsRepository;

/**
 * Class GeneralContentOneSettingsService
 * @package App\Services
 */
class GeneralContentOneSettingsService
{
    /**
     * @var GeneralContentOneSettingsRepository
     */
    private $generalContentOneSettings;
    /**
     * @var PageElementService
     */
    private $pageElementService;

    /**
     * GeneralContentOneSettingsService constructor.
     * @param GeneralContentOneSettingsRepository $generalContentOneSettings
     * @param PageElementService $pageElementService
     */
    public function __construct(GeneralContentOneSettingsRepository $generalContentOneSettings, PageElementService $pageElementService)
    {
        $this->generalContentOneSettings = $generalContentOneSettings;
        $this->pageElementService = $pageElementService;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->generalContentOneSettings->all();
    }

    /**
     * @param $id
     * @return \App\GeneralContentOneSettings
     */
    public function find($id)
    {
        return $this->generalContentOneSettings->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->generalContentOneSettings->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $settingsId = $this->pageElementService->find($id)->pageElementable->id;

        return $this->generalContentOneSettings->update($request, $settingsId);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->generalContentOneSettings->delete($id);
    }
}
