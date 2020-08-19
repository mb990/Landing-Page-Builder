<?php


namespace App\Repositories;


use App\HeroSectionSettings;

/**
 * Class HeroSectionSettingsRepository
 * @package App\Repositories
 */
class HeroSectionSettingsRepository
{
    /**
     * @var HeroSectionSettings
     */
    private $heroSectionSettings;

    /**
     * HeroSectionSettingsRepository constructor.
     * @param HeroSectionSettings $heroSectionSettings
     */
    public function __construct(HeroSectionSettings $heroSectionSettings)
    {
        $this->heroSectionSettings = $heroSectionSettings;
    }

    /**
     * @return HeroSectionSettings[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->heroSectionSettings->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->heroSectionSettings->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->heroSectionSettings->create($request->all());
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
