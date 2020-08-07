<?php


namespace App\Repositories;


use App\GeneralContentOneSettings;

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
