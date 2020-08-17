<?php


namespace App\Services;


use App\Repositories\PricingSettingsBenefitRepository;

class PricingSettingsBenefitService
{
    /**
     * @var PricingSettingsBenefitRepository
     */
    private $pricingSettingsBenefit;
    /**
     * @var PriceSettingsService
     */
    private $priceSettingsService;

    /**
     * PricingSettingsBenefitService constructor.
     * @param PricingSettingsBenefitRepository $pricingSettingsBenefit
     * @param PriceSettingsService $priceSettingsService
     */
    public function __construct(PricingSettingsBenefitRepository $pricingSettingsBenefit, PriceSettingsService $priceSettingsService)
    {
        $this->pricingSettingsBenefit = $pricingSettingsBenefit;
        $this->priceSettingsService = $priceSettingsService;
    }

    /**
     * @return \App\PricingSettingsBenefit[]|\Illuminate\Database\Eloquent\Collection
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
        return $this->pricingSettingsBenefit->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
//        $benefitId = $this->priceSettingsService->find($id)->

        return $this->pricingSettingsBenefit->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->pricingSettingsBenefit->delete($id);
    }
}
