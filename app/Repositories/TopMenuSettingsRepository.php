<?php


namespace App\Repositories;


use App\TopMenuSettings;

/**
 * Class TopMenuSettingsRepository
 * @package App\Repositories
 */
class TopMenuSettingsRepository
{
    /**
     * @var TopMenuSettings
     */
    private $topMenuSettings;

    /**
     * TopMenuSettingsRepository constructor.
     * @param TopMenuSettings $topMenuSettings
     */
    public function __construct(TopMenuSettings $topMenuSettings)
    {
        $this->topMenuSettings = $topMenuSettings;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->topMenuSettings->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->topMenuSettings->create($request->all());
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->find($id)->update($request->all());
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->find($id)->delete();
    }
}
