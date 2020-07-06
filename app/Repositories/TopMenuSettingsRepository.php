<?php


namespace App\Repositories;


use App\TopMenuSettings;

class TopMenuSettingsRepository
{
    /**
     * @var TopMenuSettings
     */
    private $topMenuSettings;

    public function __construct(TopMenuSettings $topMenuSettings)
    {
        $this->topMenuSettings = $topMenuSettings;
    }

    public function find($id)
    {
        return $this->topMenuSettings->find($id);
    }

    public function store($request)
    {
        return $this->topMenuSettings->create($request->all());
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
