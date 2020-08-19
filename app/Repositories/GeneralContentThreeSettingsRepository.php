<?php


namespace App\Repositories;


use App\GeneralContentThreeSettings;

/**
 * Class GeneralContentThreeSettingsRepository
 * @package App\Repositories
 */
class GeneralContentThreeSettingsRepository
{
    /**
     * @var GeneralContentThreeSettings
     */
    private $generalContentThreeSettings;

    /**
     * GeneralContentThreeSettingsRepository constructor.
     * @param GeneralContentThreeSettings $generalContentThreeSettings
     */
    public function __construct(GeneralContentThreeSettings $generalContentThreeSettings)
    {
        $this->generalContentThreeSettings = $generalContentThreeSettings;
    }

    /**
     * @return GeneralContentThreeSettings[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->generalContentThreeSettings->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->generalContentThreeSettings->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->generalContentThreeSettings->create($request->all());
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
