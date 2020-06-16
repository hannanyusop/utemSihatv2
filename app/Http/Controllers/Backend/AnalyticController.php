<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


class AnalyticController extends Controller
{

    public function index()
    {
        return view('backend.report.index');
    }
}
