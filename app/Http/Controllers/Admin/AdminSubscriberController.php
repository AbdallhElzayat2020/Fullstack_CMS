<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AdminSubscriberRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class AdminSubscriberController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */

    public $subscriber;

    public function __construct(AdminSubscriberRepositoryInterface $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('show subscribers', 'admin'), only: ['index', 'store']),
            new Middleware(PermissionMiddleware::using('delete subscribers', 'admin'), only: ['destroy']),
        ];
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
