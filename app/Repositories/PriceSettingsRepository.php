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

    public function update($request, $id, $sectionId)
    {
        return $this->find($id)->update([
            'name' => $request->name,
            'yearly_price' => $request->yearly_price,
            'monthly_price' => $request->monthly_price,
            'discount_amount' => $request->discount_amount,
            'blade_file' => $request->blade_file,
            'pricing_section_id' => $sectionId
        ]);
    }

    public function delete($id)
    {
        $this->find($id)->delete();
    }
}
