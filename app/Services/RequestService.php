<?php


namespace App\Services;


class RequestService
{
    /**
     * @var ProjectService
     */
    private $projectService;

    /**
     * RequestService constructor.
     * @param ProjectService $projectService
     */
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function addProjectIdToRequest($request)
    {
        $project = $this->projectService->findBySlug($request->get('slug'));

        $request->merge(['project_id' => $project->id]);

        return $request;
    }
}
