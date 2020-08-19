<?php


namespace App\Repositories;


use App\NewsletterSettings;

/**
 * Class NewsletterRepository
 * @package App\Repositories
 */
class NewsletterRepository
{
    /**
     * @var NewsletterSettings
     */
    private $newsletter;

    /**
     * NewsletterRepository constructor.
     * @param NewsletterSettings $newsletter
     */
    public function __construct(NewsletterSettings $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * @return NewsletterSettings[]|\Illuminate\Database\Eloquent\Collection
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
        return $this->newsletter->create($request->all());
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
     * @param $id
     */
    public function delete($id)
    {
        $this->find($id)->delete();
    }
}
