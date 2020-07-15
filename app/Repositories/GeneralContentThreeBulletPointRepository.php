<?php


namespace App\Repositories;


use App\GeneralContentThreeBulletPoint;

class GeneralContentThreeBulletPointRepository
{
    /**
     * @var GeneralContentThreeBulletPoint
     */
    private $generalContentThreeBulletPoint;

    public function __construct(GeneralContentThreeBulletPoint $generalContentThreeBulletPoint)
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
        return $this->generalContentThreeBulletPoint->create($request->all());
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
