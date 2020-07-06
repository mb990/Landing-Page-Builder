<?php


namespace App\Services;


use App\Repositories\TopMenuLinkRepository;

class TopMenuLinkService
{
    /**
     * @var TopMenuLinkRepository
     */
    private $topMenuLink;

    public function __construct(TopMenuLinkRepository $topMenuLink)
    {
        $this->topMenuLink = $topMenuLink;
    }

    public function find($id)
    {
        return $this->topMenuLink->find($id);
    }

    public function store($request)
    {
        return $this->topMenuLink->store($request);
    }

    public function update($request, $id)
    {
        return $this->topMenuLink->update($request, $id);
    }

    public function delete($id)
    {
        return $this->topMenuLink->delete($id);
    }
}
