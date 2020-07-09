<?php


namespace App\Services;


use App\Repositories\PricingSectionRepository;

class PricingSectionService
{
    /**
     * @var PricingSectionRepository
     */
    private $pricingSection;

    public function __construct(PricingSectionRepository $pricingSection)
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
        return $this->pricingSection->store($request);
    }

    public function update($request, $id)
    {
        return $this->pricingSection->update($request, $id);
    }

    public function delete($id)
    {
        return $this->pricingSection->delete($id);
    }
}
