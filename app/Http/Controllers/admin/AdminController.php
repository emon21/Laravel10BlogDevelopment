<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    //admin after login
    public function admin(){

        return view('backend.admin');

    }

    public function index() {

        return view('backend.test');
    }
    public function demo() {

        return view('backend.demo');
    }
}
