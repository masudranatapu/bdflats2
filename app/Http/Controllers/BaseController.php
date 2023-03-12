<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $resp;

    public function __construct()
    {
        $this->resp = [];
    }
}
