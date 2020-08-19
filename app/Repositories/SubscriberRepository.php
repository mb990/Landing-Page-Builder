<?php


namespace App\Repositories;


use App\Subscriber;

/**
 * Class SubscriberRepository
 * @package App\Repositories
 */
class SubscriberRepository
{
    /**
     * @var Subscriber
     */
    private $subscriber;

    /**
     * SubscriberRepository constructor.
     * @param Subscriber $subscriber
     */
    public function __construct(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    /**
     * @return Subscriber[]|\Illuminate\Database\Eloquent\Collection
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
        return $this->subscriber->create($request->except(['project_slug']));
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
