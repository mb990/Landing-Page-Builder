<?php


namespace App\Services;


use App\Repositories\TopMenuSettingsRepository;

/**
 * Class TopMenuSettingsService
 * @package App\Services
 */
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

    /**
     * TopMenuSettingsService constructor.
     * @param TopMenuSettingsRepository $topMenuSettings
     * @param RequestService $requestService
     */
    public function __construct(TopMenuSettingsRepository $topMenuSettings, RequestService $requestService)
    {
        $this->topMenuSettings = $topMenuSettings;
        $this->requestService = $requestService;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->topMenuSettings->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
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

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->topMenuSettings->update($request, $id);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->topMenuSettings->delete($id);
    }

    /**
     * @param $request
     * @return bool
     */
    public function checkIfItIsProjectElement($request)
    {
        if ($request->project_id) {

            return true;
        }

        return false;
    }
}
