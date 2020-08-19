<?php


namespace App\Repositories;


/**
 * Class BaseRepository
 * @package App\Repositories
 */
class BaseRepository extends AbstractRepositoryClass
{
    /**
     * BaseRepository constructor.
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
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
     * @return mixed
     */
    public function find($id)
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
     * @return mixed|void
     */
    public function delete($id)
    {
        $this->find($id)->delete();
    }
}
