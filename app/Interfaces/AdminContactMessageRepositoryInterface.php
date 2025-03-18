<?php

namespace App\Interfaces;

interface AdminContactMessageRepositoryInterface
{
    public function index();
    public function sendReplay($request);
}
