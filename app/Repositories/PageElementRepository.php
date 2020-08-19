<?php


namespace App\Repositories;


use App\PageElement;

/**
 * Class PageElementRepository
 * @package App\Repositories
 */
class PageElementRepository
{
    /**
     * @var PageElement
     */
    private $pageElement;

    /**
     * PageElementRepository constructor.
     * @param PageElement $pageElement
     */
    public function __construct(PageElement $pageElement)
    {
        $this->pageElement = $pageElement;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->pageElement->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->pageElement->create($request->all());
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
        try {
            $element = $this->find($id);

            $this->deletePageElementableForProjectSection($element);

            $element->delete();
        } catch (\Exception $e) {
        }
    }

    /**
     * @param $projectSection
     */
    public function deletePageElementableForProjectSection($projectSection)
    {
        try {
            $projectSection->pageElementable->delete();
        } catch (\Exception $e) {
        }
    }
}
