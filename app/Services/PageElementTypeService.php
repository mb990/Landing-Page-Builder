<?php


namespace App\Services;


use App\Repositories\PageElementTypeRepository;

/**
 * Class PageElementTypeService
 * @package App\Services
 */
class PageElementTypeService
{
    /**
     * @var PageElementTypeRepository
     */
    private $pageElementType;

    /**
     * PageElementTypeService constructor.
     * @param PageElementTypeRepository $pageElementType
     */
    public function __construct(PageElementTypeRepository $pageElementType)
    {
        $this->pageElementType = $pageElementType;
    }

    /**
     * @return \App\PageElementType[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->pageElementType->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->pageElementType->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->pageElementType->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->pageElementType->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->pageElementType->delete($id);
    }
}
