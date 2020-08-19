<?php


namespace App\Repositories;


/**
 * Class AbstractRepositoryClass
 * @package App\Repositories
 */
abstract class AbstractRepositoryClass
{

    protected $model;

    abstract public function all();

    /**
     * @param int $id
     * @return mixed
     */
    abstract public function find(int $id);

    /**
     * @param $request
     * @return mixed
     */
    abstract public function store($request);

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    abstract public function update($request, $id);

    /**
     * @param $id
     * @return mixed
     */
    abstract public function delete($id);

}
