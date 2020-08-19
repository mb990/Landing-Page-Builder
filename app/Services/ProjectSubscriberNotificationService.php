<?php


namespace App\Services;


use App\Notifications\ProjectSubscribersNotification;
use App\Project;

/**
 * Class ProjectSubscriberNotificationService
 * @package App\Services
 */
class ProjectSubscriberNotificationService
{
    /**
     * @var ProjectService
     */
    private $projectService;

    /**
     * ProjectSubscriberNotificationService constructor.
     * @param ProjectService $projectService
     */
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * @param $request
     */
    public function sendMessageToProjectSubscribers($request)
    {
        $project = $this->projectService->find($request->input('project_id'));

        foreach ($project->subscribers as $subscriber) {

            $subscriber->notify(new ProjectSubscribersNotification($request->input('message'), auth()->user()->email));
        }
    }
}
