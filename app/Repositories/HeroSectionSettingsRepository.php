<?php


namespace App\Repositories;


use App\HeroSectionSettings;

class HeroSectionSettingsRepository
{
    /**
     * @var HeroSectionSettings
     */
    private $heroSectionSettings;

    public function __construct(HeroSectionSettings $heroSectionSettings)
    {
        $this->heroSectionSettings = $heroSectionSettings;
    }

    public function all()
    {
        return $this->heroSectionSettings->all();
    }

    public function find($id)
    {
        return $this->heroSectionSettings->find($id);
    }

    public function store($request)
    {
        return $this->heroSectionSettings->create($request->all());
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
