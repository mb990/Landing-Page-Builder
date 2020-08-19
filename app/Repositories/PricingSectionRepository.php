<?php


namespace App\Repositories;


use App\PricingSection;

/**
 * Class PricingSectionRepository
 * @package App\Repositories
 */
class PricingSectionRepository
{
    /**
     * @var PricingSection
     */
    private $pricingSection;

    /**
     * PricingSectionRepository constructor.
     * @param PricingSection $pricingSection
     */
    public function __construct(PricingSection $pricingSection)
    {
        $this->pricingSection = $pricingSection;
    }

    /**
     * @return PricingSection[]|\Illuminate\Database\Eloquent\Collection
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
        return $this->pricingSection->create($request->all());
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
