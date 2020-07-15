<?php


namespace App\Repositories;


use App\NewsletterSettings;

class NewsletterRepository
{
    /**
     * @var NewsletterSettings
     */
    private $newsletter;

    public function __construct(NewsletterSettings $newsletter)
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
        return $this->newsletter->create($request->all());
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
