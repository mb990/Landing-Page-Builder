<?php


namespace App\Repositories;


use App\GeneralContentThreeTile;

class GeneralContentThreeTileRepository
{
    /**
     * @var GeneralContentThreeTile
     */
    private $generalContentThreeTile;

    public function __construct(GeneralContentThreeTile $generalContentThreeTile)
    {
        $this->generalContentThreeTile = $generalContentThreeTile;
    }

    public function all()
    {
        return $this->generalContentThreeTile->all();
    }

    public function find($id)
    {
        return $this->generalContentThreeTile->find($id);
    }

    public function store($request)
    {
        return $this->generalContentThreeTile->create($request->all());
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
