<?php


namespace App\Repositories;

use App\TestimonialSettings;

class TestimonialSettingsRepository
{
    /**
     * @var TestimonialSettings
     */
    private $testimonialSettings;

    public function __construct(TestimonialSettings $testimonialSettings)
    {
        $this->testimonialSettings = $testimonialSettings;
    }

    public function all()
    {
        return $this->testimonialSettings->all();
    }

    public function find($id)
    {
        return $this->testimonialSettings->find($id);
    }

    public function store($request)
    {
        return $this->testimonialSettings->create($request->all());
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
