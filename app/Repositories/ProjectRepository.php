<?php


namespace App\Repositories;

use App\Project;

/**
 * Class ProjectRepository
 * @package App\Repositories
 */
class ProjectRepository
{
    /**
     * @var Project
     */
    private $project;

    /**
     * ProjectRepository constructor.
     * @param Project $project
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
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
        return $this->project->where('slug', $slug)
            ->firstOrFail();
    }

    /**
     * @param $user
     * @return mixed
     */
    public function findLatestForUser($user)
    {
        return $this->project->where('user_id', $user->id)
            ->latest()
            ->first();
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->project->create($request->all());
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
     * @param $project
     */
    public function delete($project)
    {
        $project->delete();
    }
}
