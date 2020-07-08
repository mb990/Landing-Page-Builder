<?php


namespace App\Services;


use App\Repositories\PricingSettingsBenefitRepository;

class PricingSettingsBenefitService
{
    /**
     * @var PricingSettingsBenefitRepository
     */
    private $pricingSettingsBenefit;

    public function __construct(PricingSettingsBenefitRepository $pricingSettingsBenefit)
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
        return $this->pricingSettingsBenefit->store($request);
    }

    public function update($request, $id)
    {
        return $this->pricingSettingsBenefit->update($request, $id);
    }

    public function delete($id)
    {
        return $this->pricingSettingsBenefit->delete($id);
    }
}
