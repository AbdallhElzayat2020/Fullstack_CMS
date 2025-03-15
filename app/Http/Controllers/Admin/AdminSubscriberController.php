<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AdminSubscriberRepositoryInterface;
use Illuminate\Http\Request;

class AdminSubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $subscriber;

    public function __construct(AdminSubscriberRepositoryInterface $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    public function index()
    {
        return $this->subscriber->index();
    }

    public function store(Request $request)
    {
        return $this->subscriber->store($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->subscriber->delete($id);
    }
}
