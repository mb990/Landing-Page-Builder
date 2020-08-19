<?php


namespace App\Services;


use App\Repositories\TestimonialSettingsRepository;

/**
 * Class TestimonialSettingsService
 * @package App\Services
 */
class TestimonialSettingsService
{
    /**
     * @var TestimonialSettingsRepository
     */
    private $testimonial;

    /**
     * TestimonialSettingsService constructor.
     * @param TestimonialSettingsRepository $testimonial
     */
    public function __construct(TestimonialSettingsRepository $testimonial)
    {
        $this->testimonial = $testimonial;
    }

    /**
     * @return \App\TestimonialSettings[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->testimonial->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->testimonial->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->testimonial->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->testimonial->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->testimonial->delete($id);
    }
}
