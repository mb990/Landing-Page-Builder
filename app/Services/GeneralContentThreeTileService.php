<?php


namespace App\Services;


use App\Repositories\GeneralContentThreeTileRepository;

class GeneralContentThreeTileService
{
    /**
     * @var GeneralContentThreeTileRepository
     */
    private $generalContentThreeTile;

    public function __construct(GeneralContentThreeTileRepository $generalContentThreeTile)
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
        return $this->generalContentThreeTile->store($request);
    }

    public function update($request, $id)
    {
        return $this->generalContentThreeTile->update($request, $id);
    }

    public function delete($id)
    {
        return $this->generalContentThreeTile->delete($id);
    }
}
