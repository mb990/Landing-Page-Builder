<?php


namespace App\Repositories;


use App\TopMenuLink;

class TopMenuLinkRepository
{
    /**
     * @var TopMenuLink
     */
    private $topMenuLink;

    public function __construct(TopMenuLink $topMenuLink)
    {
        $this->topMenuLink = $topMenuLink;
    }

    public function find($id)
    {
        return $this->topMenuLink->find($id);
    }

    public function store($request)
    {
        return $this->topMenuLink->create($request->all());
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
