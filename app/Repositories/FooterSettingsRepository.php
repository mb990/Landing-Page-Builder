<?php


namespace App\Repositories;


use App\FooterSettings;

class FooterSettingsRepository
{
    /**
     * @var FooterSettings
     */
    private $footerSettings;

    public function __construct(FooterSettings $footerSettings)
    {
        $this->footerSettings = $footerSettings;
    }

    public function all()
    {
        return $this->footerSettings->all();
    }

    public function find($id)
    {
        return $this->footerSettings->findOrFail($id);
    }

    public function store($request)
    {
        return $this->footerSettings->create($request->all());
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
