<?php


namespace App\Services;


use App\Repositories\PageElementRepository;

class PageElementService
{
    /**
     * @var PageElementRepository
     */
    private $pageElement;

    public function __construct(PageElementRepository $pageElement)
    {
        $this->pageElement = $pageElement;
    }

    public function find($id)
    {
        return $this->pageElement->find($id);
    }

    public function store($request)
    {
        return $this->pageElement->store($request);
    }

    public function update($request, $id)
    {
        return $this->pageElement->update($request, $id);
    }

    public function delete($id)
    {
        return $this->pageElement->delete($id);
    }

    public function deletePageElementableForProjectSection($projectSection)
    {
        return $this->pageElement->deletePageElementableForProjectSection($projectSection);
    }
}
