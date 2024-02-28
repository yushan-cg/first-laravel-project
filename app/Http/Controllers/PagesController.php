<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = "Welcome to PHP Laravel Tutorials";
        return view('pages.index', compact('title'));
    }

    public function about(){
        return view('pages.about');
    }

    public function service(){
        return view('pages.service');
    }
}
