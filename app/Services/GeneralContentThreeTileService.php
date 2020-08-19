<?php


namespace App\Services;


use App\Repositories\GeneralContentThreeTileRepository;

/**
 * Class GeneralContentThreeTileService
 * @package App\Services
 */
class GeneralContentThreeTileService
{
    /**
     * @var GeneralContentThreeTileRepository
     */
    private $generalContentThreeTile;

    /**
     * GeneralContentThreeTileService constructor.
     * @param GeneralContentThreeTileRepository $generalContentThreeTile
     */
    public function __construct(GeneralContentThreeTileRepository $generalContentThreeTile)
    {
        $this->generalContentThreeTile = $generalContentThreeTile;
    }

    /**
     * @return \App\GeneralContentThreeTile[]|\Illuminate\Database\Eloquent\Collection
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
        return $this->generalContentThreeTile->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->generalContentThreeTile->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->generalContentThreeTile->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->generalContentThreeTile->delete($id);
    }
}
