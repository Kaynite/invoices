<?php

namespace App\Http\Controllers;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($view)
    {
        if (view()->exists("design.$view")) {
            return view("design.$view");
        } else {
            return view('404');
        }
    }

}
