<?php


namespace App\Repositories;


use App\PricingSettingsBenefit;

class PricingSettingsBenefitRepository
{
    /**
     * @var PricingSettingsBenefit
     */
    private $pricingSettingsBenefit;

    /**
     * PricingSettingsBenefitRepository constructor.
     * @param PricingSettingsBenefit $pricingSettingsBenefit
     */
    public function __construct(PricingSettingsBenefit $pricingSettingsBenefit)
    {
        $this->pricingSettingsBenefit = $pricingSettingsBenefit;
    }

    /**
     * @return PricingSettingsBenefit[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->pricingSettingsBenefit->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->pricingSettingsBenefit->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->pricingSettingsBenefit->create($request->all());
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->find($id)->update($request->all());
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->find($id)->delete();
    }
}
