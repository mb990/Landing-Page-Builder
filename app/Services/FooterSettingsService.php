<?php


namespace App\Services;


use App\Repositories\FooterSettingsRepository;

class FooterSettingsService
{
    /**
     * @var FooterSettingsRepository
     */
    private $footerSettings;

    public function __construct(FooterSettingsRepository $footerSettings)
    {
        $this->footerSettings = $footerSettings;
    }

    public function all()
    {
        return $this->footerSettings->all();
    }

    public function find($id)
    {
        return $this->footerSettings->find($id);
    }

    public function store($request)
    {
        return $this->footerSettings->store($request);
    }

    public function update($request, $id)
    {
        return $this->footerSettings->update($request, $id);
    }

    public function delete($id)
    {
        return $this->footerSettings->delete($id);
    }
}
