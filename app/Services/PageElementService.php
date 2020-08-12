<?php


namespace App\Services;


use App\GallerySettings;
use App\PageElement;
use App\Project;
use App\Repositories\PageElementRepository;
use App\TestimonialSection;

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
    public function store($request, $project)
    {
        if ($project->getElementWithHighestOrder()) {

            $requestWithRenderOrder = $this->setRequestRenderOrderValueIfNotFirstElement($project, $request);

            return $this->pageElement->store($requestWithRenderOrder);
        }

        $request->merge(['render_order' => 1]);

        return $this->pageElement->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->pageElement->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->deleteElementS3Images($this->find($id));

        return $this->pageElement->delete($id);
    }

    /**
     * @param $projectSection
     */
    public function deletePageElementableForProjectSection($projectSection)
    {
        $this->deleteElementS3Images($projectSection);

        return $this->pageElement->deletePageElementableForProjectSection($projectSection);
    }

    /**
     * @param $element
     * @return bool
     */
    public function elementHasImage($element)
    {
        if (!$element->pageElementable->image) {

            return false;
        }

        return true;
    }

    /**
     * @param $component
     * @return bool
     */
    public function componentIsAGallery($component)
    {
        if ($component->page_elementable_type === GallerySettings::class) {

            return true;
        }

        return false;
    }

    /**
     * @param $component
     * @return bool
     */
    public function componentIsATestimonial($component)
    {
        if ($component->page_elementable_type === TestimonialSection::class) {

            return true;
        }

        return false;
    }

    /**
     * @param PageElement $projectSection
     */
    public function deleteElementS3Images(PageElement $projectSection): void
    {
        if ($this->elementHasImage($projectSection)) {

            $this->s3Service->deleteImageItem($this->getProjectElementImagePath($projectSection));
        }

        if ($this->componentIsAGallery($projectSection)) {

            foreach ($this->getProjectElementImagePath($projectSection) as $imagePath) {

                $this->s3Service->deleteImageItem($imagePath);
            }
        }

        if ($this->componentIsATestimonial($projectSection)) {

            foreach ($this->getProjectElementImagePath($projectSection) as $imagePath) {

                $this->s3Service->deleteImageItem($imagePath);
            }
        }
    }

    public function getProjectElementImagePath($element)
    {
        if ($this->elementHasImage($element)) {

            $image = $element->pageElementable->image;

            return 'projects/' . $element->project->name . '_' . $element->project->id . '/' . $image->filename;
        }

        $imagePaths = [];

        if ($this->componentIsAGallery($element)) {

            foreach ($element->pageElementable->imageItems as $imageItem) {

                $image = $imageItem->image;

                $imagePaths[] = 'projects/' . $element->project->name . '_' . $element->project->id . '/gallery/images/' . $image->filename;
            }
        }

        if ($this->componentIsATestimonial($element)) {

            foreach ($element->pageElementable->singleItems as $singleItem) {

                $image = $singleItem->image;

                $imagePaths[] = 'projects/' . $element->project->name . '_' . $element->project->id . '/testimonials/' . $image->filename;
            }
        }

        return $imagePaths;
    }

    /**
     * @param $project
     * @param $request
     * @return mixed
     */
    public function setRequestRenderOrderValueIfNotFirstElement($project, $request)
    {
        $num = $project->getElementWithHighestOrder()->render_order;

        $request->merge(['render_order' => $num + 1]);

        return $request;
    }
}
