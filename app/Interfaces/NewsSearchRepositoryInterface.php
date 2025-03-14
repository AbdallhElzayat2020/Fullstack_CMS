<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface NewsSearchRepositoryInterface
{
    public function news(Request $request);
}
