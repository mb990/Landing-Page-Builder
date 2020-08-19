<?php


namespace App\Services;


use App\GallerySettings;
use App\Repositories\ProjectRepository;
use App\TestimonialSection;

/**
 * Class ProjectService
 * @package App\Services
 */
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

    /**
     * ProjectService constructor.
     * @param ProjectRepository $project
     * @param S3Service $s3Service
     * @param PageElementService $pageElementService
     */
    public function __construct(ProjectRepository $project, S3Service $s3Service, PageElementService $pageElementService)
    {
        $this->project = $project;
        $this->s3Service = $s3Service;
        $this->pageElementService = $pageElementService;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->project->find($id);
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug)
    {
        return $this->project->findBySlug($slug);
    }

    /**
     * @param $user
     * @return mixed
     */
    public function findLatestForUser($user)
    {
        return $this->project->findLatestForUser($user);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->project->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->project->update($request, $id);
    }

    /**
     * @param $slug
     */
    public function delete($slug)
    {
        $project = $this->findBySlug($slug);

        $this->deleteProjectElements($project);

        return $this->project->delete($project);
    }

    /**
     * @param $project
     */
    public function deleteProjectElements($project)
    {
        foreach ($project->getSections() as $section) {

            $this->pageElementService->deletePageElementableForProjectSection($section);
        }
    }

    /**
     * @param $component
     * @return mixed
     */
    public function getComponentData($component)
    {
        $data = $component->pageElementable;

        return $data;
    }

    /**
     * @param $gallery
     * @return array
     */
    public function getGalleryData($gallery)
    {
        $data = [];

        $data['data'] = $gallery->pageElementable;

        $data['images'] = $this->getComponentImages($gallery);

        $data ['videos'] = $this->getGalleryVideoData($gallery);

        return $data;
    }

    /**
     * @param $testimonialSection
     * @return array
     */
    public function getTestimonialData($testimonialSection)
    {
        $data = [];

        $data['data'] = $this->getComponentData($testimonialSection);

        $data['images'] = $this->getComponentImages($testimonialSection);

        return $data;
    }

    /**
     * @param $component
     * @return bool|mixed
     */
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

    /**
     * @param $component
     * @return array
     */
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

    /**
     * @param $gallery
     * @return array|bool
     */
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

    /**
     * @param $component
     * @param $data
     * @return array|string
     * @throws \Throwable
     */
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

    /**
     * @param $id
     * @return array
     */
    public function showRenderedProjectSingleComponentWithData($id)
    {
        $pageData = [];

        $pageData['element'] = $this->pageElementService->find($id);

        $data = $this->getComponentData($pageData['element']);

        $pageData['view'] = $this->renderComponentView($pageData['element'], $data);

        return $pageData;
    }

    /**
     * @param $slug
     * @return array
     */
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
