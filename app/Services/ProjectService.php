<?php


namespace App\Services;


use App\GallerySettings;
use App\Repositories\ProjectRepository;
use App\TestimonialSection;

class ProjectService
{
    /**
     * @var ProjectRepository
     */
    private $project;
    /**
     * @var S3Service
     */
    private $s3Service;
    /**
     * @var PageElementService
     */
    private $pageElementService;

    public function __construct(ProjectRepository $project, S3Service $s3Service, PageElementService $pageElementService)
    {
        $this->project = $project;
        $this->s3Service = $s3Service;
        $this->pageElementService = $pageElementService;
    }

    public function find($id)
    {
        return $this->project->find($id);
    }

    public function findBySlug($slug)
    {
        return $this->project->findBySlug($slug);
    }

    public function findLatestForUser($user)
    {
        return $this->project->findLatestForUser($user);
    }

    public function store($request)
    {
        return $this->project->store($request);
    }

    public function update($request, $id)
    {
        return $this->project->update($request, $id);
    }

    public function delete($slug)
    {
        $project = $this->findBySlug($slug);

        $this->deleteProjectElements($project);

        return $this->project->delete($project);
    }

    public function deleteProjectElements($project)
    {
        foreach ($project->getSections() as $section) {

            $this->pageElementService->deletePageElementableForProjectSection($section);
        }
    }

    public function getComponentData($component)
    {
        $data = $component->pageElementable;

        return $data;
    }

    public function getGalleryData($gallery)
    {
        $data = [];

        $data['data'] = $gallery->pageElementable;

        $data['images'] = $this->getComponentImages($gallery);

        $data ['videos'] = $this->getGalleryVideoData($gallery);

        return $data;
    }

    public function getTestimonialData($testimonialSection)
    {
        $data = [];

        $data['data'] = $this->getComponentData($testimonialSection);

        $data['images'] = $this->getComponentImages($testimonialSection);

        return $data;
    }

    public function getComponentImageData($component)
    {
        if ($component->pageElementable->image) {

            $image = $component->pageElementable->image;

            $path = 'projects/' . $component->project->name . '_' . $component->project->id . '/' . $image->filename;

            $imageUrl = $this->s3Service->showProjectImage($path, 60);

            return  $imageUrl;
        }

        return false;
    }

    public function getComponentImages($component)
    {
        $images = [];

        // gallery
        if ($component->pageElementable->imageItems) {

            foreach ($component->pageElementable->imageItems as $imageItem) {

                $image = $imageItem->image;

                if ($image) {

                    $path = 'projects/' . $component->project->name . '_' . $component->project->id . '/gallery/images/' . $image->filename;

                    $images[$imageItem->id] = $this->s3Service->showProjectImage($path, 60);
                }
            }
        }

        // testimonial
        if ($component->pageElementable->singleItems) {

            foreach ($component->pageElementable->singleItems as $singleItem) {

                $image = $singleItem->image;

                if ($image) {

                    $path = 'projects/' . $component->project->name . '_' . $component->project->id . '/testimonials/' . $image->filename;

                    $images[$singleItem->id] = $this->s3Service->showProjectImage($path, 60);
                }
            }
        }

        return $images;
    }

    public function getGalleryVideoData($gallery)
    {
        if ($gallery->pageElementable->videoItems) {

            $videos = [];

            foreach ($gallery->pageElementable->videoItems as $videoItem) {

                $path = 'projects/' . $gallery->project->name . '_' . $gallery->project->id . '/gallery/videos/';

                $videos[$videoItem->id] = $this->s3Service->showProjectGalleryVideo($path, $videoItem, 60);
            }

            return  $videos;
        }

        return false;
    }

    public function renderComponentView($component, $data)
    {
        if ($this->pageElementService->elementHasImage($component)) {

            return $this->renderComponentViewWithBasicDataAndImage($component, $data);
        }

        if ($this->pageElementService->componentIsAGallery($component)) {

            return $this->renderComponentViewWithBasicDataOnly($component, $this->getGalleryData($component));
        }

        if ($this->pageElementService->componentIsATestimonial($component)) {

            return $this->renderComponentViewWithBasicDataOnly($component, $this->getTestimonialData($component));
        }

        $view = $this->renderComponentViewWithBasicDataOnly($component, $data);

        return $view;
    }

    public function showRenderedProjectSingleComponentWithData($id)
    {
        $pageData = [];

        $pageData['element'] = $this->pageElementService->find($id);

        $data = $this->getComponentData($pageData['element']);

        $pageData['view'] = $this->renderComponentView($pageData['element'], $data);

        return $pageData;
    }

    public function showRenderedProjectComponentsWithData($slug)
    {
        $project = $this->findBySlug($slug);

        $views = [];

        foreach ($project->getSections() as $section) {

            $data = $this->getComponentData($section);

            $views[$section->id . '-' . $section->pageElementType->name] = $this->renderComponentView($section, $data);
        }

        return $views;
    }



    /**
     * @param $component
     * @param $data
     * @return array|string
     * @throws \Throwable
     */
    public function renderComponentViewWithBasicDataAndImage($component, $data)
    {
        $imageUrl = $this->getComponentImageData($component);

        $view = view($component->blade_file, ['data' => $data, 'image_url' => $imageUrl])->render();

        return $view;
    }

    /**
     * @param $component
     * @param $data
     * @return array|string
     * @throws \Throwable
     */
    public function renderComponentViewWithBasicDataOnly($component, $data)
    {
        $view = view($component->blade_file, ['data' => $data])->render();

        return $view;
    }
}
