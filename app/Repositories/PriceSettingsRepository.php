<?php


namespace App\Repositories;


use App\PriceSettings;

class PriceSettingsRepository
{
    /**
     * @var PriceSettings
     */
    private $priceSettings;

    public function __construct(PriceSettings $priceSettings)
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
        return $this->priceSettings->create($request->all());
    }

    public function update($request, $id)
    {
        return $this->find($id)->update($request->all());
    }

    public function delete($id)
    {
        $this->find($id)->delete();
    }
}
