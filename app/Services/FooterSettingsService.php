<?php


namespace App\Services;


use App\Repositories\FooterSettingsRepository;

class FooterSettingsService
{
    /**
     * @var FooterSettingsRepository
     */
    private $footerSettings;
    /**
     * @var PageElementService
     */
    private $pageElementService;

    /**
     * FooterSettingsService constructor.
     * @param FooterSettingsRepository $footerSettings
     * @param PageElementService $pageElementService
     */
    public function __construct(FooterSettingsRepository $footerSettings, PageElementService $pageElementService)
    {
        $this->footerSettings = $footerSettings;
        $this->pageElementService = $pageElementService;
    }

    /**
     * @return \App\FooterSettings[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->footerSettings->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->footerSettings->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->footerSettings->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $settingsId = $this->pageElementService->find($id)->pageElementable->id;

        return $this->footerSettings->update($request, $settingsId);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->footerSettings->delete($id);
    }
}
