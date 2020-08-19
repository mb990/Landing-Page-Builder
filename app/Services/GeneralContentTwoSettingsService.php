<?php


namespace App\Services;


use App\Repositories\GeneralContentTwoSettingsRepository;

/**
 * Class GeneralContentTwoSettingsService
 * @package App\Services
 */
class GeneralContentTwoSettingsService
{
    /**
     * @var GeneralContentTwoSettingsRepository
     */
    private $generalContentTwoSettings;
    /**
     * @var PageElementService
     */
    private $pageElementService;

    /**
     * GeneralContentTwoSettingsService constructor.
     * @param GeneralContentTwoSettingsRepository $generalContentTwoSettings
     * @param PageElementService $pageElementService
     */
    public function __construct(GeneralContentTwoSettingsRepository $generalContentTwoSettings, PageElementService $pageElementService)
    {
        $this->generalContentTwoSettings = $generalContentTwoSettings;
        $this->pageElementService = $pageElementService;
    }

    /**
     * @return \App\GeneralContentTwoSettings[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->generalContentTwoSettings->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->generalContentTwoSettings->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->generalContentTwoSettings->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $settingsId = $this->pageElementService->find($id)->pageElementable->id;

        return $this->generalContentTwoSettings->update($request, $settingsId);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->generalContentTwoSettings->delete($id);
    }
}
