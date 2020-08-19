<?php


namespace App\Repositories;


use App\GeneralContentOneSettings;

/**
 * Class GeneralContentOneSettingsRepository
 * @package App\Repositories
 */
class GeneralContentOneSettingsRepository extends BaseRepository
{
    /**
     * @var GeneralContentOneSettings
     */

    public function __construct(GeneralContentOneSettings $generalContentOneSettings)
    {
        parent::__construct($generalContentOneSettings);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }


    /**
     * @param int $id
     * @return GeneralContentOneSettings
     */
    public function find($id) :GeneralContentOneSettings
    {
        return $this->model->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->model->create($request->all());
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id): GeneralContentOneSettings
    {
        $this->find($id)->update($request->all());

        return $this->find($id);
    }

    /**
     * @param $id
     */
    public function delete($id) :void
    {
        $this->find($id)->delete();
    }
}
