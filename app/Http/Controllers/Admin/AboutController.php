<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AdminAboutRepositoryInterface;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public $about;

    public function __construct(AdminAboutRepositoryInterface $about)
    {
        $this->about = $about;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->about->index();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->about->update($request);
    }


}
