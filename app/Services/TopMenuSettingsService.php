<?php


namespace App\Services;


use App\Repositories\TopMenuSettingsRepository;

class TopMenuSettingsService
{
    /**
     * @var TopMenuSettingsRepository
     */
    private $topMenuSettings;
    /**
     * @var RequestService
     */
    private $requestService;

    public function __construct(TopMenuSettingsRepository $topMenuSettings, RequestService $requestService)
    {
        $this->topMenuSettings = $topMenuSettings;
        $this->requestService = $requestService;
    }

    public function find($id)
    {
        return $this->topMenuSettings->find($id);
    }

    public function store($request)
    {
//        if ($this->checkIfItIsProjectElement($request)) {
//
//            $newRequest = $this->requestService->addProjectIdToRequest($request);
//
//            return $this->topMenuSettings->store($newRequest);
//        }

        return $this->topMenuSettings->store($request);
    }

    public function update($request, $id)
    {
        return $this->topMenuSettings->update($request, $id);
    }

    public function delete($id)
    {
        return $this->topMenuSettings->delete($id);
    }

    public function checkIfItIsProjectElement($request)
    {
        if ($request->project_id) {

            return true;
        }

        return false;
    }
}
