<?php


namespace App\Repositories;


use App\PageElement;

class PageElementRepository
{
    /**
     * @var PageElement
     */
    private $pageElement;

    public function __construct(PageElement $pageElement)
    {
        $this->pageElement = $pageElement;
    }

    public function find($id)
    {
        return $this->pageElement->find($id);
    }

    public function store($request)
    {
        return $this->pageElement->create($request->all());
    }

    public function update($request, $id)
    {
        return $this->find($id)->update($request->all());
    }

    public function delete($id)
    {
        $this->find($id)->delete();
    }

    public function deletePageElementableForProjectSection($projectSection)
    {
        $projectSection->pageElementable->delete();
    }
}
