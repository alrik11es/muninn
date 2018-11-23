<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScenarioController extends Controller
{
    use BasicResourceTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
