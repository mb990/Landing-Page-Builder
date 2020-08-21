<?php


namespace App\Services;


use App\GalleryImageItem;
use App\GallerySettings;
use App\Image;
use App\PageElement;
use App\Project;
use App\Repositories\PageElementRepository;
use App\TestimonialSection;
use App\TestimonialSettings;

/**
 * Class PageElementService
 * @package App\Services
 */
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
     * @param Image $image
     * @return mixed
     */
    public function findElementByImage(Image $image)
    {
        if ($this->getGalleryByImage($image)) {

            return $this->getGalleryByImage($image);
        }

        if ($this->getTestimonialSectionByImage($image)) {

            return $this->getTestimonialSectionByImage($image);
        }

        return $this->getBasicElementByImage($image);
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
        $this->deleteElementS3Items($this->find($id));

        return $this->pageElement->delete($id);
    }

    /**
     * @param $projectSection
     */
    public function deletePageElementableForProjectSection($projectSection)
    {
        $this->deleteElementS3Items($projectSection);

        return $this->pageElement->deletePageElementableForProjectSection($projectSection);
    }

    /**
     * @param $element
     * @return bool
     */
    public function elementHasImage($element)
    {
        if (!isset($element->pageElementable->image)) {

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
    public function deleteElementS3Items(PageElement $projectSection): void
    {
        if ($this->elementHasImage($projectSection)) {

            $this->s3Service->deleteImageItem($this->getProjectElementImagePath($projectSection));
        }

        if ($this->componentIsAGallery($projectSection)) {

            if ($projectSection->pageElementable->hasImage()) {

                foreach ($this->getProjectElementImagePath($projectSection) as $imagePath) {

                    $this->s3Service->deleteImageItem($imagePath);
                }
            }

            if ($projectSection->pageElementable->hasVideo()) {

                $this->deleteElementS3Videos($projectSection);
            }

        }

        if ($this->componentIsATestimonial($projectSection)) {

            foreach ($this->getProjectElementImagePath($projectSection) as $imagePath) {

                $this->s3Service->deleteImageItem($imagePath);
            }
        }
    }

    /**
     * @param PageElement $element
     */
    public function deleteElementS3Videos(PageElement $element)
    {
        foreach ($element->pageElementable->videoItems as $videoItem) {

//            $path = $this->getProjectElementVideoPath($element);

            $videoName = $this->s3Service->getVideoFileName($videoItem);

            $videoPath = 'projects/' . $element->project->name . '_' . $element->project->id . '/gallery/videos/' . $videoName . '.mp4';

            $this->s3Service->deleteVideoItem($videoPath);
        }
    }

    /**
     * @param $element
     * @return array|string
     */
    public function getProjectElementImagePath($element)
    {
        if ($this->elementHasImage($element)) {

            return $this->getBasicElementImageS3Path($element);
        }

        $imagePaths = [];

        if ($this->componentIsAGallery($element)) {

            foreach ($element->pageElementable->imageItems as $imageItem) {

                $imagePaths[] = $this->getGalleryImageS3Path($imageItem, $element);
            }
        }

        if ($this->componentIsATestimonial($element)) {

            foreach ($element->pageElementable->singleItems as $singleItem) {

                $imagePaths[] = $this->getTestimonialImageS3Path($singleItem, $element);
            }
        }

        return $imagePaths;
    }

    /**
     * @param $element
     * @return bool|string
     */
    public function getSingleImagePathFromMultipleImagesElement($element)
    {
        if (isset($element->testimonialSection)) {

            return $this->getTestimonialImageS3Path($element, $element->testimonialSection->pageElement);
        }

        if ($this->elementHasImage($element)) {

            return $this->getBasicElementImageS3Path($element);
        }

        if (isset($element->gallery)) {

            return $this->getGalleryImageS3Path($element, $element->gallery->pageElement);
        }
    }

    /**
     * @param $videoItem
     * @return string
     */
    public function getProjectElementVideoPath($videoItem)
    {
        $element = $videoItem->gallery->pageElement;

        $videoName = $this->s3Service->getVideoFileName($videoItem);

        $videoPath = 'projects/' . $element->project->name . '_' . $element->project->id . '/gallery/videos/' . $videoName . '.mp4';

        return $videoPath;
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

    /**
     * @param Image $image
     * @return mixed
     */
    public function getBasicElementByImage(Image $image)
    {
        if (isset($image->imageable->pageElement)) {

            return $image->imageable->pageElement;
        }
        return false;
    }

    /**
     * @param Image $image
     * @return mixed
     */
    public function getTestimonialSectionByImage(Image $image)
    {
        if (isset($image->imageable->testimonialSection)) {

            return $image->imageable->testimonialSection->pageElement;
        }
        return false;
    }

    /**
     * @param Image $image
     * @return mixed
     */
    public function getGalleryByImage(Image $image)
    {
        if (isset($image->imageable->gallery)) {

            return $image->imageable->gallery->pageElement;
        }

        return false;
    }

    /**
     * @param TestimonialSettings $singleItem
     * @param PageElement $element
     * @return string
     */
    public function getTestimonialImageS3Path(TestimonialSettings $singleItem, PageElement $element): string
    {
        $image = $singleItem->image;

        $imagePath = 'projects/' . $element->project->name . '_' . $element->project->id . '/testimonials/' . $image->filename;

        return $imagePath;
    }

    /**
     * @param GalleryImageItem $imageItem
     * @param PageElement $element
     * @return string
     */
    public function getGalleryImageS3Path(GalleryImageItem $imageItem, PageElement $element)
    {
        $image = $imageItem->image;

        $imagePath = 'projects/' . $element->project->name . '_' . $element->project->id . '/gallery/images/' . $image->filename;

        return $imagePath;
    }

    /**
     * @param PageElement $element
     * @return string
     */
    public function getBasicElementImageS3Path(PageElement $element): string
    {
        $image = $element->pageElementable->image;

        return 'projects/' . $element->project->name . '_' . $element->project->id . '/' . $image->filename;
    }
}
