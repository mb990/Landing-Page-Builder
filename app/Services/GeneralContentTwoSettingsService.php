<?php


namespace App\Services;


use App\Repositories\GeneralContentTwoSettingsRepository;

/**
 * Class GeneralContentTwoSettingsService
 * @package App\Services
 */
class GeneralContentTwoSettingsService
{
    /**
     * @var GeneralContentTwoSettingsRepository
     */
    private $generalContentTwoSettings;

    /**
     * GeneralContentTwoSettingsService constructor.
     * @param GeneralContentTwoSettingsRepository $generalContentTwoSettings
     */
    public function __construct(GeneralContentTwoSettingsRepository $generalContentTwoSettings)
    {
        $this->generalContentTwoSettings = $generalContentTwoSettings;
    }

    /**
     * @return \App\GeneralContentTwoSettings[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->generalContentTwoSettings->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->generalContentTwoSettings->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->generalContentTwoSettings->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->generalContentTwoSettings->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->generalContentTwoSettings->delete($id);
    }
}
