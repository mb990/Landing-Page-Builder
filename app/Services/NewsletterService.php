<?php


namespace App\Services;


use App\Repositories\NewsletterRepository;

class NewsletterService
{
    /**
     * @var NewsletterRepository
     */
    private $newsletter;

    public function __construct(NewsletterRepository $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    public function all()
    {
        return $this->newsletter->all();
    }

    public function find($id)
    {
        return $this->newsletter->find($id);
    }

    public function store($request)
    {
        return $this->newsletter->store($request);
    }

    public function update($request, $id)
    {
        return $this->newsletter->update($request, $id);
    }

    public function delete($id)
    {
        return $this->newsletter->delete($id);
    }
}
