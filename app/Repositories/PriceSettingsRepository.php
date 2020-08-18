<?php


namespace App\Repositories;


use App\PriceSettings;

class PriceSettingsRepository
{
    /**
     * @var PriceSettings
     */
    private $priceSettings;

    /**
     * PriceSettingsRepository constructor.
     * @param PriceSettings $priceSettings
     */
    public function __construct(PriceSettings $priceSettings)
    {
        $this->priceSettings = $priceSettings;
    }

    /**
     * @return PriceSettings[]|\Illuminate\Database\Eloquent\Collection
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
        return $this->priceSettings->create($request->all());
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->find($id)->update([
        'name' => $request->name,
        'yearly_price' => $request->yearly_price,
        'monthly_price' => $request->monthly_price,
        'discount_amount' => $request->discount_amount
        ]);

    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->find($id)->delete();
    }
}
