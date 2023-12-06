<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Controller;
use App\Models\Catagory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Catagory::all();

        return view('categories.index', compact('categories'));
    }
    public function show(Catagory $category)
    {


        return view('categories.show', compact('category'));
    }
}
