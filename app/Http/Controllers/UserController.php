<?php

namespace App\Http\Controllers;


class UserController extends Controller
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
