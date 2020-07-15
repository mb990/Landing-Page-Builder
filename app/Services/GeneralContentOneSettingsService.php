<?php


namespace App\Services;


use App\Repositories\GeneralContentOneSettingsRepository;

class GeneralContentOneSettingsService
{
    /**
     * @var GeneralContentOneSettingsRepository
     */
    private $generalContentOneSettings;

    public function __construct(GeneralContentOneSettingsRepository $generalContentOneSettings)
    {
        $this->generalContentOneSettings = $generalContentOneSettings;
    }

    public function all()
    {
        return $this->generalContentOneSettings->all();
    }

    public function find($id)
    {
        return $this->generalContentOneSettings->find($id);
    }

    public function store($request)
    {
        return $this->generalContentOneSettings->store($request);
    }

    public function update($request, $id)
    {
        return $this->generalContentOneSettings->update($request, $id);
    }

    public function delete($id)
    {
        return $this->generalContentOneSettings->delete($id);
    }
}
