<?php


namespace App\Repositories;


use App\PageElementType;

/**
 * Class PageElementTypeRepository
 * @package App\Repositories
 */
class PageElementTypeRepository
{
    /**
     * @var PageElementType
     */
    private $pageElementType;

    /**
     * PageElementTypeRepository constructor.
     * @param PageElementType $pageElementType
     */
    public function __construct(PageElementType $pageElementType)
    {
        $this->pageElementType = $pageElementType;
    }

    /**
     * @return PageElementType[]|\Illuminate\Database\Eloquent\Collection
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
        return $this->pageElementType->create($request->all());
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
