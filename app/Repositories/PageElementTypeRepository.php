<?php


namespace App\Repositories;


use App\PageElementType;

class PageElementTypeRepository
{
    /**
     * @var PageElementType
     */
    private $pageElementType;

    public function __construct(PageElementType $pageElementType)
    {
        $this->pageElementType = $pageElementType;
    }

    public function find($id)
    {
        return $this->pageElementType->find($id);
    }

    public function store($request)
    {
        return $this->pageElementType->create($request->all());
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
