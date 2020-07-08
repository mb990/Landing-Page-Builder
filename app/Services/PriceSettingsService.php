<?php


namespace App\Services;


use App\Repositories\PriceSettingsRepository;

class PriceSettingsService
{
    /**
     * @var PriceSettingsRepository
     */
    private $priceSettings;

    public function __construct(PriceSettingsRepository $priceSettings)
    {
        $this->priceSettings = $priceSettings;
    }

    public function all()
    {
        return $this->priceSettings->all();
    }

    public function find($id)
    {
        return $this->priceSettings->find($id);
    }

    public function store($request)
    {
        return $this->priceSettings->store($request);
    }

    public function update($request, $id)
    {
        return $this->priceSettings->update($request, $id);
    }

    public function delete($id)
    {
        return $this->priceSettings->delete($id);
    }
}
