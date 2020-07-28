<?php


namespace App\Services;


use App\Repositories\ProjectRepository;

class ProjectService
{
    /**
     * @var ProjectRepository
     */
    private $project;

    public function __construct(ProjectRepository $project)
    {
        $this->project = $project;
    }

    public function find($id)
    {
        return $this->project->find($id);
    }

    public function findBySlug($slug)
    {
        return $this->project->findBySlug($slug);
    }

    public function store($request)
    {
        return $this->project->store($request);
    }

    public function update($request, $id)
    {
        return $this->project->update($request, $id);
    }

    public function delete($id)
    {
        return $this->project->delete($id);
    }
}
