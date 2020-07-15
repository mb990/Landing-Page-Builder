<?php


namespace App\Services;


use App\Repositories\GeneralContentThreeBulletPointRepository;

class GeneralContentThreeBulletPointService
{
    /**
     * @var GeneralContentThreeBulletPointRepository
     */
    private $generalContentThreeBulletPoint;

    public function __construct(GeneralContentThreeBulletPointRepository $generalContentThreeBulletPoint)
    {
        $this->generalContentThreeBulletPoint = $generalContentThreeBulletPoint;
    }

    public function all()
    {
        return $this->generalContentThreeBulletPoint->all();
    }

    public function find($id)
    {
        return $this->generalContentThreeBulletPoint->find($id);
    }

    public function store($request)
    {
        return $this->generalContentThreeBulletPoint->store($request);
    }

    public function update($request, $id)
    {
        return $this->generalContentThreeBulletPoint->update($request, $id);
    }

    public function delete($id)
    {
        return $this->generalContentThreeBulletPoint->delete($id);
    }
}
