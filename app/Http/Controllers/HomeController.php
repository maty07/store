<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carousel;

class HomeController extends Controller
{

    public function index()
    {
        $carousels = Carousel::orderBy('id', 'DESC')->where('active', 1)->get();

        return view('home', compact('carousels', 'first_carousel'));
    }

}
