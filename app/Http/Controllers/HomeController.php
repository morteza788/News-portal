<?php


namespace App\Http\Controllers;

use App\Models\Article;



class HomeController
{
    public function index()
    {
        return view('app.index');
    }
}