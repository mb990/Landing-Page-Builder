<?php


namespace App\Services;


use App\GallerySettings;
use App\Repositories\ProjectRepository;

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

        $data['data'] = $gallery;

        $data['images'] = $this->getComponentImages($gallery);

        $data ['videos'] = $this->getGalleryVideoData($gallery);

        return $data;
    }

    public function getComponentImageData($component)
    {
        if ($component->pageElementable->image) {

            $imageUrl = ''; //ovde ide s3 kreiranje linka za sliku

            return  $imageUrl;
        }

        return false;
    }

    public function getComponentImages($component)
    {
        $images = [];

        if ($component->pageElementable->imageItems) {

            foreach ($component->pageElementable->imageItems as $imageItem) {

                $images[$imageItem->id] = ''; //ovde ide s3 kreiranje linka za sliku
            }
        }

        return $images;
    }

    public function getGalleryVideoData($gallery)
    {
        if ($gallery->pageElementable->videoItems) {

            $videos = [];

            foreach ($gallery->pageElementable->videoItems as $videoItem) {

                $videos[$videoItem->id] = ''; //ovde ide s3 kreiranje linka za video
            }

            return  $videos;
        }

        return false;
    }

    public function componentHasAnImage($component)
    {
        if ($component->pageElementable->image) {

            return true;
        }

        return false;
    }

    public function componentIsAGallery($component)
    {
        if ($component->pageElementable->page_elementable_type === GallerySettings::class) {

            return true;
        }

        return false;
    }

    public function renderComponentView($component, $data)
    {
        if ($this->componentHasAnImage($component)) {

            return $this->renderComponentViewWithBasicDataAndImage($component, $data);
        }

        if ($this->componentIsAGallery($component)) {

            return $this->renderComponentViewWithBasicDataOnly($component, $this->getGalleryData($component));
        }

        $view = $this->renderComponentViewWithBasicDataOnly($component, $data);

        return $view;
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
