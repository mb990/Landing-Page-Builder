<?php


namespace App\Repositories;


use App\TopMenuLink;

/**
 * Class TopMenuLinkRepository
 * @package App\Repositories
 */
class TopMenuLinkRepository
{
    /**
     * @var TopMenuLink
     */
    private $topMenuLink;

    /**
     * TopMenuLinkRepository constructor.
     * @param TopMenuLink $topMenuLink
     */
    public function __construct(TopMenuLink $topMenuLink)
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
        return $this->topMenuLink->create($request->all());
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
