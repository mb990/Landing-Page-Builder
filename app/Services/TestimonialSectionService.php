<?php


namespace App\Services;


use App\Repositories\TestimonialSectionRepository;

class TestimonialSectionService
{
    /**
     * @var TestimonialSectionRepository
     */
    private $testimonialSection;

    public function __construct(TestimonialSectionRepository $testimonialSection)
    {
        $this->testimonialSection = $testimonialSection;
    }

    public function all()
    {
        return $this->testimonialSection->all();
    }

    public function find($id)
    {
        return $this->testimonialSection->find($id);
    }

    public function store($request)
    {
        return $this->testimonialSection->store($request);
    }

    public function update($request, $id)
    {
        return $this->testimonialSection->update($request, $id);
    }

    public function delete($id)
    {
        return $this->testimonialSection->delete($id);
    }
}
