<?php


namespace App\Repositories;


use App\GeneralContentOneSettings;

class GeneralContentOneSettingsRepository
{
    /**
     * @var GeneralContentOneSettings
     */
    private $generalContentOneSettings;

    public function __construct(GeneralContentOneSettings $generalContentOneSettings)
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
        return $this->generalContentOneSettings->create($request->all());
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
