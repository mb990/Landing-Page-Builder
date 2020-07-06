<?php


namespace App\Services;


use App\Repositories\TopMenuSettingsRepository;

class TopMenuSettingsService
{
    /**
     * @var TopMenuSettingsRepository
     */
    private $topMenuSettings;

    public function __construct(TopMenuSettingsRepository $topMenuSettings)
    {
        $this->topMenuSettings = $topMenuSettings;
    }

    public function find($id)
    {
        return $this->topMenuSettings->find($id);
    }

    public function store($request)
    {
        return $this->topMenuSettings->store($request);
    }

    public function update($request, $id)
    {
        return $this->topMenuSettings->update($request, $id);
    }

    public function delete($id)
    {
        return $this->topMenuSettings->delete($id);
    }
}
