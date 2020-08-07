<?php


namespace App\Repositories;


abstract class AbstractRepositoryClass
{

    protected $model;

    abstract public function all();

    abstract public function find(int $id);

    abstract public function store($request);

    abstract public function update($request, $id);

    abstract public function delete($id);

}
