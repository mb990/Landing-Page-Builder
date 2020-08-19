<?php


namespace App\Repositories;


use App\GeneralContentThreeBulletPoint;

/**
 * Class GeneralContentThreeBulletPointRepository
 * @package App\Repositories
 */
class GeneralContentThreeBulletPointRepository
{
    /**
     * @var GeneralContentThreeBulletPoint
     */
    private $generalContentThreeBulletPoint;

    /**
     * GeneralContentThreeBulletPointRepository constructor.
     * @param GeneralContentThreeBulletPoint $generalContentThreeBulletPoint
     */
    public function __construct(GeneralContentThreeBulletPoint $generalContentThreeBulletPoint)
    {
        $this->generalContentThreeBulletPoint = $generalContentThreeBulletPoint;
    }

    /**
     * @return GeneralContentThreeBulletPoint[]|\Illuminate\Database\Eloquent\Collection
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
        return $this->generalContentThreeBulletPoint->create($request->all());
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
