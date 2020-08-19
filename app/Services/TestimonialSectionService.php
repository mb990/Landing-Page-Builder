<?php


namespace App\Services;


use App\Repositories\TestimonialSectionRepository;

/**
 * Class TestimonialSectionService
 * @package App\Services
 */
class TestimonialSectionService
{
    /**
     * @var TestimonialSectionRepository
     */
    private $testimonialSection;

    /**
     * TestimonialSectionService constructor.
     * @param TestimonialSectionRepository $testimonialSection
     */
    public function __construct(TestimonialSectionRepository $testimonialSection)
    {
        $this->testimonialSection = $testimonialSection;
    }

    /**
     * @return \App\TestimonialSection[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->testimonialSection->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->testimonialSection->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->testimonialSection->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->testimonialSection->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->testimonialSection->delete($id);
    }
}
