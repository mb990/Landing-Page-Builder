<?php


namespace App\Services;


use App\Repositories\PageElementTypeRepository;

class PageElementTypeService
{
    /**
     * @var PageElementTypeRepository
     */
    private $pageElementType;

    public function __construct(PageElementTypeRepository $pageElementType)
    {
        $this->pageElementType = $pageElementType;
    }

    public function all()
    {
        return $this->pageElementType->all();
    }

    public function find($id)
    {
        return $this->pageElementType->find($id);
    }

    public function store($request)
    {
        return $this->pageElementType->store($request);
    }

    public function update($request, $id)
    {
        return $this->pageElementType->update($request, $id);
    }

    public function delete($id)
    {
        return $this->pageElementType->delete($id);
    }
}
