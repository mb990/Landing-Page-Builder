<?php


namespace App\Services;


use App\Repositories\AwesomeIconsRepository;

/**
 * Class AwesomeIconsService
 * @package App\Services
 */
class AwesomeIconsService
{
    /**
     * @var AwesomeIconsRepository
     */
    private $awesomeIcons;

    /**
     * AwesomeIconsService constructor.
     * @param AwesomeIconsRepository $awesomeIcons
     */
    public function __construct(AwesomeIconsRepository $awesomeIcons)
    {
        $this->awesomeIcons = $awesomeIcons;
    }

    /**
     * @return \App\AwesomeIcon[]|\Illuminate\Database\Eloquent\Collection
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
        return $this->awesomeIcons->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->awesomeIcons->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->awesomeIcons->delete($id);
    }
}
