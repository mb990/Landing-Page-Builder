<?php


namespace App\Repositories;


use App\PricingSection;

class PricingSectionRepository
{
    /**
     * @var PricingSection
     */
    private $pricingSection;

    public function __construct(PricingSection $pricingSection)
    {
        $this->pricingSection = $pricingSection;
    }
    public function all()
    {
        return $this->pricingSection->all();
    }

    public function find($id)
    {
        return $this->pricingSection->find($id);
    }

    public function store($request)
    {
        return $this->pricingSection->create($request->all());
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
