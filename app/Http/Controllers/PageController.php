<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Show the application home page.
     */
    public function index(): View
    {
        return view('index');
    }

    /**
     * Show the about page.
     */
    public function about(): View
    {
        return view('about');
    }

    /**
     * Show the service page.
     */
    public function service(): View
    {
        return view('service');
    }

    /**
     * Show the industries page.
     */
    public function industries(): View
    {
        return view('industries');
    }

    /**
     * Show the contact page.
     */
    public function contact(): View
    {
        return view('contact');
    }
}
