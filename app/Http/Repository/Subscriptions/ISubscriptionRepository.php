<?php

namespace App\Http\Repository\Subscriptions;

interface ISubscriptionRepository
{
    public function create(array $data);
    public function get(int $id);
    public function getAll();
    public function update(array $data, int $id);
    public function delete(int $id);
}
