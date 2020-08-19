<?php


namespace App\Repositories;


use App\TestimonialSection;

/**
 * Class TestimonialSectionRepository
 * @package App\Repositories
 */
class TestimonialSectionRepository
{
    /**
     * @var TestimonialSection
     */
    private $testimonialSection;

    /**
     * TestimonialSectionRepository constructor.
     * @param TestimonialSection $testimonialSection
     */
    public function __construct(TestimonialSection $testimonialSection)
    {
        $this->testimonialSection = $testimonialSection;
    }

    /**
     * @return TestimonialSection[]|\Illuminate\Database\Eloquent\Collection
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
        return $this->testimonialSection->create($request->all());
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
