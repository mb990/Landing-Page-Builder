<?php


namespace App\Services;


use App\Repositories\SubscriberRepository;

class SubscriberService
{
    /**
     * @var SubscriberRepository
     */
    private $subscriber;

    public function __construct(SubscriberRepository $subscriber)
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
        return $this->subscriber->store($request);
    }

    public function update($request, $id)
    {
        return $this->subscriber->update($request, $id);
    }

    public function delete($id)
    {
        return $this->subscriber->delete($id);
    }
}
