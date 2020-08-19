<?php


namespace App\Services;


use App\Repositories\PricingSectionRepository;

/**
 * Class PricingSectionService
 * @package App\Services
 */
class PricingSectionService
{
    /**
     * @var PricingSectionRepository
     */
    private $pricingSection;

    /**
     * PricingSectionService constructor.
     * @param PricingSectionRepository $pricingSection
     */
    public function __construct(PricingSectionRepository $pricingSection)
    {
        $this->pricingSection = $pricingSection;
    }

    /**
     * @return \App\PricingSection[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->pricingSection->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->pricingSection->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->pricingSection->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->pricingSection->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->pricingSection->delete($id);
    }
}
