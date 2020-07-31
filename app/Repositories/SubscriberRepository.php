<?php


namespace App\Repositories;


use App\Subscriber;

class SubscriberRepository
{
    /**
     * @var Subscriber
     */
    private $subscriber;

    public function __construct(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
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
        return $this->subscriber->create($request->except(['project_slug']));
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
