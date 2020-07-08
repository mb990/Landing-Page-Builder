<?php


namespace App\Repositories;


use App\PricingSettingsBenefit;

class PricingSettingsBenefitRepository
{
    /**
     * @var PricingSettingsBenefit
     */
    private $pricingSettingsBenefit;

    public function __construct(PricingSettingsBenefit $pricingSettingsBenefit)
    {
        $this->pricingSettingsBenefit = $pricingSettingsBenefit;
    }

    public function all()
    {
        return $this->pricingSettingsBenefit->all();
    }

    public function find($id)
    {
        return $this->pricingSettingsBenefit->find($id);
    }

    public function store($request)
    {
        return $this->pricingSettingsBenefit->create($request->all());
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
