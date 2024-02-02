<?php

namespace App\Http\Controllers;

use App\Http\Repository\Subscriptions\ISubscriptionRepository;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Traits\ResponFormater;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    use ResponFormater;
    public function __construct(
        private ISubscriptionRepository $subscriptionRepo
    )
    {
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = $this->subscriptionRepo->getAll();
        return $this->success(__('global.success',['message' => 'list subscriptions']),$subscriptions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriptionRequest $request)
    {
        $this->subscriptionRepo->create($request->validated());
        return $this->success(__('global.success',['message' => 'add subscriptions']),null);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subscription = $this->subscriptionRepo->getAll();
        return $this->success(__('global.success',['message' => 'detail subscription']),$subscription);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubscriptionRequest $request, string $id)
    {
        $this->subscriptionRepo->update($request->validated(),$id);
        return $this->success(__('global.success',['message' => 'update subscriptions']),null);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->subscriptionRepo->delete($id);
        return $this->success(__('global.success',['message' => 'delete subscriptions']),null);
    }
}
