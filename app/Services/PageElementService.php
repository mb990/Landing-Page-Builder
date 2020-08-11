<?php


namespace App\Services;


use App\Repositories\PageElementRepository;

class PageElementService
{
    /**
     * @var PageElementRepository
     */
    private $pageElement;
    /**
     * @var S3Service
     */
    private $s3Service;

    /**
     * PageElementService constructor.
     * @param PageElementRepository $pageElement
     * @param S3Service $s3Service
     */
    public function __construct(PageElementRepository $pageElement, S3Service $s3Service)
    {
        $this->pageElement = $pageElement;
        $this->s3Service = $s3Service;
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
        if ($this->elementHasImages($projectSection)) {

            $image = $projectSection->pageElementable->image;

            $path = 'projects/' . $projectSection->project->name . '_' . $projectSection->project->id . '/' . $image->filename;;

            $this->s3Service->deleteImageItem($path);
        }

        return $this->pageElement->deletePageElementableForProjectSection($projectSection);
    }

    public function elementHasImages($element)
    {
        if (!$element->pageElementable->image) {

            return false;
        }

        return true;
    }

    public function elementSubElementHasImages($element)
    {
        if (!$element->pageElementable->imageItem->image) {

            return false;
        }

        else if (!$element->pageElementable->singleItem->image) {

            return false;
        }

        return true;
    }
}
