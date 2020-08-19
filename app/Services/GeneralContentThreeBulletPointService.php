<?php


namespace App\Services;


use App\Repositories\GeneralContentThreeBulletPointRepository;

/**
 * Class GeneralContentThreeBulletPointService
 * @package App\Services
 */
class GeneralContentThreeBulletPointService
{
    /**
     * @var GeneralContentThreeBulletPointRepository
     */
    private $generalContentThreeBulletPoint;

    /**
     * GeneralContentThreeBulletPointService constructor.
     * @param GeneralContentThreeBulletPointRepository $generalContentThreeBulletPoint
     */
    public function __construct(GeneralContentThreeBulletPointRepository $generalContentThreeBulletPoint)
    {
        $this->generalContentThreeBulletPoint = $generalContentThreeBulletPoint;
    }

    /**
     * @return \App\GeneralContentThreeBulletPoint[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->generalContentThreeBulletPoint->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->generalContentThreeBulletPoint->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->generalContentThreeBulletPoint->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->generalContentThreeBulletPoint->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->generalContentThreeBulletPoint->delete($id);
    }
}
