<?php


namespace App\Services;


use App\Repositories\GeneralContentTwoSettingsRepository;

class GeneralContentTwoSettingsService
{
    /**
     * @var GeneralContentTwoSettingsRepository
     */
    private $generalContentTwoSettings;

    public function __construct(GeneralContentTwoSettingsRepository $generalContentTwoSettings)
    {
        $this->generalContentTwoSettings = $generalContentTwoSettings;
    }

    public function all()
    {
        return $this->generalContentTwoSettings->all();
    }

    public function find($id)
    {
        return $this->generalContentTwoSettings->find($id);
    }

    public function store($request)
    {
        return $this->generalContentTwoSettings->store($request);
    }

    public function update($request, $id)
    {
        return $this->generalContentTwoSettings->update($request, $id);
    }

    public function delete($id)
    {
        return $this->generalContentTwoSettings->delete($id);
    }
}
