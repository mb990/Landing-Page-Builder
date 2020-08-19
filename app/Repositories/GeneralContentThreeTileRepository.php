<?php


namespace App\Repositories;


use App\GeneralContentThreeTile;

/**
 * Class GeneralContentThreeTileRepository
 * @package App\Repositories
 */
class GeneralContentThreeTileRepository
{
    /**
     * @var GeneralContentThreeTile
     */
    private $generalContentThreeTile;

    /**
     * GeneralContentThreeTileRepository constructor.
     * @param GeneralContentThreeTile $generalContentThreeTile
     */
    public function __construct(GeneralContentThreeTile $generalContentThreeTile)
    {
        $this->generalContentThreeTile = $generalContentThreeTile;
    }

    /**
     * @return GeneralContentThreeTile[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->generalContentThreeTile->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->generalContentThreeTile->findorFail($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->generalContentThreeTile->create($request->all());
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
