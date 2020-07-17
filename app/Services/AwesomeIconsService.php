<?php


namespace App\Services;


use App\Repositories\AwesomeIconsRepository;

class AwesomeIconsService
{
    /**
     * @var AwesomeIconsRepository
     */
    private $awesomeIcons;

    public function __construct(AwesomeIconsRepository $awesomeIcons)
    {
        $this->awesomeIcons = $awesomeIcons;
    }

    public function all()
    {
        return $this->awesomeIcons->all();
    }

    public function find($id)
    {
        return $this->awesomeIcons->find($id);
    }

    public function store($request)
    {
        return $this->awesomeIcons->store($request);
    }

    public function update($request, $id)
    {
        return $this->awesomeIcons->update($request, $id);
    }

    public function delete($id)
    {
        return $this->awesomeIcons->delete($id);
    }
}
