<?php


namespace App\Services;


use App\Repositories\GeneralContentThreeSettingsRepository;

/**
 * Class GeneralContentThreeSettingsService
 * @package App\Services
 */
class GeneralContentThreeSettingsService
{
    /**
     * @var GeneralContentThreeSettingsRepository
     */
    private $generalContentThreeSettings;

    /**
     * GeneralContentThreeSettingsService constructor.
     * @param GeneralContentThreeSettingsRepository $generalContentThreeSettings
     */
    public function __construct(GeneralContentThreeSettingsRepository $generalContentThreeSettings)
    {
        $this->generalContentThreeSettings = $generalContentThreeSettings;
    }

    /**
     * @return \App\GeneralContentThreeSettings[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->generalContentThreeSettings->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->generalContentThreeSettings->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->generalContentThreeSettings->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->generalContentThreeSettings->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->generalContentThreeSettings->delete($id);
    }
}
