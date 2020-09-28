<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Laptop;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $laptop = Laptop::with('Brand')->OrderBy('id', 'desc')->latest()->paginate(6);
        return view('homepage', compact('laptop'));
    }
}
