<?php


namespace App\Repositories;


use App\GeneralContentTwoSettings;

class GeneralContentTwoSettingsRepository
{
    /**
     * @var GeneralContentTwoSettings
     */
    private $generalContentTwoSettings;

    public function __construct(GeneralContentTwoSettings $generalContentTwoSettings)
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
        return $this->generalContentTwoSettings->create($request->all());
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
