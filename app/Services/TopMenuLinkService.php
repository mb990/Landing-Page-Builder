<?php


namespace App\Services;


use App\Repositories\TopMenuLinkRepository;

/**
 * Class TopMenuLinkService
 * @package App\Services
 */
class TopMenuLinkService
{
    /**
     * @var TopMenuLinkRepository
     */
    private $topMenuLink;

    /**
     * TopMenuLinkService constructor.
     * @param TopMenuLinkRepository $topMenuLink
     */
    public function __construct(TopMenuLinkRepository $topMenuLink)
    {
        $this->topMenuLink = $topMenuLink;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->topMenuLink->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->topMenuLink->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->topMenuLink->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->topMenuLink->delete($id);
    }
}
