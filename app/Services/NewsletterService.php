<?php


namespace App\Services;


use App\Repositories\NewsletterRepository;

class NewsletterService
{
    /**
     * @var NewsletterRepository
     */
    private $newsletter;
    /**
     * @var PageElementService
     */
    private $pageElementService;

    /**
     * NewsletterService constructor.
     * @param NewsletterRepository $newsletter
     * @param PageElementService $pageElementService
     */
    public function __construct(NewsletterRepository $newsletter, PageElementService $pageElementService)
    {
        $this->newsletter = $newsletter;
        $this->pageElementService = $pageElementService;
    }

    /**
     * @return \App\NewsletterSettings[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->newsletter->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->newsletter->find($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request)
    {
        return $this->newsletter->store($request);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $settingsId = $this->pageElementService->find($id)->pageElementable->id;

        return $this->newsletter->update($request, $settingsId);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        return $this->newsletter->delete($id);
    }
}
