<?php

namespace App\Http\Repository\Subscriptions;

use App\Http\Repository\Subscriptions\ISubscriptionRepository;
use App\Models\Subscription;

class SubscriptionRepository implements ISubscriptionRepository
{
    public function __construct(private Subscription $subscription)
    {
    }


    public function create(array $data)
    {
        $this->subscription->create($data);
    }

    public function get(int $id)
    {
        return $this->subscription->findOrFail($id);
    }

    public function getAll()
    {
        return $this->subscription->get();
    }

    public function update(array $data, int $id)
    {
        $this->subscription
            ->findOrFail($id)
            ->update($data);
    }

    public function delete(int $id)
    {
       $this->subscription
           ->findOrFail($id)
           ->delete();
    }


}
