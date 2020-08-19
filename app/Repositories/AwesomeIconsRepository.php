<?php


namespace App\Repositories;


use App\AwesomeIcon;

/**
 * Class AwesomeIconsRepository
 * @package App\Repositories
 */
class AwesomeIconsRepository
{
    /**
     * @var AwesomeIcon
     */
    private $awesomeIcons;

    /**
     * AwesomeIconsRepository constructor.
     * @param AwesomeIcon $awesomeIcons
     */
    public function __construct(AwesomeIcon $awesomeIcons)
    {
        $this->awesomeIcons = $awesomeIcons;
    }

    /**
     * @return AwesomeIcon[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->awesomeIcons->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->awesomeIcons->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->awesomeIcons->create($request->all());
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
