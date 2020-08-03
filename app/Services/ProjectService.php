<?php


namespace App\Services;


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

}
