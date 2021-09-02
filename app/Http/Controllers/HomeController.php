<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::query()->withCount('jobs')->get();
        $jobs = Job::with('company')->whereStatus(1)->latest()->limit(10)->get();
        $companies = Company::query()->latest()->limit(10)->get();
        return view('welcome', compact('jobs', 'companies', 'categories'));
    }
}
