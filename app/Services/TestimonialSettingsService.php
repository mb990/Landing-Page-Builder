<?php


namespace App\Services;


use App\Repositories\TestimonialSettingsRepository;

class TestimonialSettingsService
{
    /**
     * @var TestimonialSettingsRepository
     */
    private $testimonial;

    public function __construct(TestimonialSettingsRepository $testimonial)
    {
        $this->testimonial = $testimonial;
    }

    public function all()
    {
        return $this->testimonial->all();
    }

    public function find($id)
    {
        return $this->testimonial->find($id);
    }

    public function store($request)
    {
        return $this->testimonial->store($request);
    }

    public function update($request, $id)
    {
        return $this->testimonial->update($request, $id);
    }

    public function delete($id)
    {
        return $this->testimonial->delete($id);
    }
}
