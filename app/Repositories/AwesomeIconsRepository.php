<?php


namespace App\Repositories;


use App\AwesomeIcon;

class AwesomeIconsRepository
{
    /**
     * @var AwesomeIcon
     */
    private $awesomeIcons;

    public function __construct(AwesomeIcon $awesomeIcons)
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
        return $this->awesomeIcons->create($request->all());
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
