<?php


namespace App\Repositories;

use App\TestimonialSettings;

/**
 * Class TestimonialSettingsRepository
 * @package App\Repositories
 */
class TestimonialSettingsRepository
{
    /**
     * @var TestimonialSettings
     */
    private $testimonialSettings;

    /**
     * TestimonialSettingsRepository constructor.
     * @param TestimonialSettings $testimonialSettings
     */
    public function __construct(TestimonialSettings $testimonialSettings)
    {
        $this->testimonialSettings = $testimonialSettings;
    }

    /**
     * @return TestimonialSettings[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->testimonialSettings->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->testimonialSettings->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->testimonialSettings->create($request->all());
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $this->find($id)->update($request->all());

        return $this->find($id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->find($id)->delete();
    }
}
