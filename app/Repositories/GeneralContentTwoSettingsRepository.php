<?php


namespace App\Repositories;


use App\GeneralContentTwoSettings;

/**
 * Class GeneralContentTwoSettingsRepository
 * @package App\Repositories
 */
class GeneralContentTwoSettingsRepository
{
    /**
     * @var GeneralContentTwoSettings
     */
    private $generalContentTwoSettings;

    /**
     * GeneralContentTwoSettingsRepository constructor.
     * @param GeneralContentTwoSettings $generalContentTwoSettings
     */
    public function __construct(GeneralContentTwoSettings $generalContentTwoSettings)
    {
        $this->generalContentTwoSettings = $generalContentTwoSettings;
    }

    /**
     * @return GeneralContentTwoSettings[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->generalContentTwoSettings->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->generalContentTwoSettings->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->generalContentTwoSettings->create($request->all());
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $this->find($id)->update($request->all());

        return $this->find($id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->find($id)->delete();
    }
}
