<?php


namespace App\Services;


use App\Repositories\PriceSettingsRepository;

class PriceSettingsService
{
    /**
     * @var PriceSettingsRepository
     */
    private $priceSettings;
    /**
     * @var PageElementService
     */
    private $pageElementService;

    /**
     * PriceSettingsService constructor.
     * @param PriceSettingsRepository $priceSettings
     * @param PageElementService $pageElementService
     */
    public function __construct(PriceSettingsRepository $priceSettings, PageElementService $pageElementService)
    {
        $this->priceSettings = $priceSettings;
        $this->pageElementService = $pageElementService;
    }

    /**
     * @return \App\PriceSettings[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->priceSettings->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->priceSettings->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->priceSettings->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $settingsId = $this->pageElementService->find($id)->pageElementable->id;

        return $this->priceSettings->update($request, $settingsId, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->priceSettings->delete($id);
    }
}
