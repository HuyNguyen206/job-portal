<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(Category $category)
    {
        $jobs = $category->jobs()->paginate(10);
        $categoryName = $category->name;
        return view('categories.index', compact('jobs', 'categoryName'));
    }
}
