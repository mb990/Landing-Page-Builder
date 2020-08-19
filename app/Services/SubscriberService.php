<?php


namespace App\Services;


use App\Repositories\SubscriberRepository;

/**
 * Class SubscriberService
 * @package App\Services
 */
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

    /**
     * SubscriberService constructor.
     * @param SubscriberRepository $subscriber
     * @param ProjectService $projectService
     */
    public function __construct(SubscriberRepository $subscriber, ProjectService $projectService)
    {
        $this->subscriber = $subscriber;
        $this->projectService = $projectService;
    }

    /**
     * @return \App\Subscriber[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->subscriber->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->subscriber->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        $data = $this->addProjectIdToRequest($request);

        return $this->subscriber->store($data);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->subscriber->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->subscriber->delete($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function addProjectIdToRequest($request)
    {
        $project_id = $this->projectService->findBySlug($request->project_slug)->id;

        $request->request->add(['project_id' => $project_id]);

        return $request;
    }
}
