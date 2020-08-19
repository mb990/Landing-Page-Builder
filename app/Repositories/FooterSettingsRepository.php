<?php


namespace App\Repositories;


use App\FooterSettings;

/**
 * Class FooterSettingsRepository
 * @package App\Repositories
 */
class FooterSettingsRepository
{
    /**
     * @var FooterSettings
     */
    private $footerSettings;

    /**
     * FooterSettingsRepository constructor.
     * @param FooterSettings $footerSettings
     */
    public function __construct(FooterSettings $footerSettings)
    {
        $this->footerSettings = $footerSettings;
    }

    /**
     * @return FooterSettings[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->footerSettings->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->footerSettings->findOrFail($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->footerSettings->create($request->all());
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
