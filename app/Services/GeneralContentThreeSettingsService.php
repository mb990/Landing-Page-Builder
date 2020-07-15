<?php


namespace App\Services;


use App\Repositories\GeneralContentThreeSettingsRepository;

class GeneralContentThreeSettingsService
{
    /**
     * @var GeneralContentThreeSettingsRepository
     */
    private $generalContentThreeSettings;

    public function __construct(GeneralContentThreeSettingsRepository $generalContentThreeSettings)
    {
        $this->generalContentThreeSettings = $generalContentThreeSettings;
    }

    public function all()
    {
        return $this->generalContentThreeSettings->all();
    }

    public function find($id)
    {
        return $this->generalContentThreeSettings->find($id);
    }

    public function store($request)
    {
        return $this->generalContentThreeSettings->store($request);
    }

    public function update($request, $id)
    {
        return $this->generalContentThreeSettings->update($request, $id);
    }

    public function delete($id)
    {
        return $this->generalContentThreeSettings->delete($id);
    }
}
