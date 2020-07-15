<?php


namespace App\Repositories;


use App\GeneralContentThreeSettings;

class GeneralContentThreeSettingsRepository
{
    /**
     * @var GeneralContentThreeSettings
     */
    private $generalContentThreeSettings;

    public function __construct(GeneralContentThreeSettings $generalContentThreeSettings)
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
        return $this->generalContentThreeSettings->create($request->all());
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
