<?php


namespace App\Repositories;


use App\TestimonialSection;

class TestimonialSectionRepository
{
    /**
     * @var TestimonialSection
     */
    private $testimonialSection;

    public function __construct(TestimonialSection $testimonialSection)
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
        return $this->testimonialSection->create($request->all());
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
