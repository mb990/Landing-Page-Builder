<?php


namespace App\Services;


use App\Repositories\SubscriberRepository;

class SubscriberService
{
    /**
     * @var SubscriberRepository
     */
    private $subscriber;
    /**
     * @var ProjectService
     */
    private $projectService;

    public function __construct(SubscriberRepository $subscriber, ProjectService $projectService)
    {
        $this->subscriber = $subscriber;
        $this->projectService = $projectService;
    }

    public function all()
    {
        return $this->subscriber->all();
    }

    public function find($id)
    {
        return $this->subscriber->find($id);
    }

    public function store($request)
    {
        $data = $this->addProjectIdToRequest($request);

        return $this->subscriber->store($data);
    }

    public function update($request, $id)
    {
        return $this->subscriber->update($request, $id);
    }

    public function delete($id)
    {
        return $this->subscriber->delete($id);
    }

    public function addProjectIdToRequest($request)
    {
        $project_id = $this->projectService->findBySlug($request->project_slug)->id;

        $request->request->add(['project_id' => $project_id]);

        return $request;
    }
}
