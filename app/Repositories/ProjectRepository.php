<?php


namespace App\Repositories;

use App\Project;

class ProjectRepository
{
    /**
     * @var Project
     */
    private $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function find($id)
    {
        return $this->project->find($id);
    }

    public function findBySlug($slug)
    {
        return $this->project->where('slug', $slug)
            ->firstOrFail();
    }

    public function findLatestForUser($user)
    {
        return $this->project->where('user_id', $user->id)
            ->latest()
            ->first();
    }

    public function store($request)
    {
        return $this->project->create($request->all());
    }

    public function update($request, $id)
    {
        return $this->find($id)->update($request->all());
    }

    public function delete($id)
    {
        $this->find($id)->delete();
    }
}
