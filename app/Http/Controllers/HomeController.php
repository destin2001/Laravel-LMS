<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentCategories;
use App\Models\Categories;
use App\Models\Branch;

class HomeController extends Controller

{
    public $categories_list = array();
    public $branch_list = array();
    public $student_categories_list = array();

    public function __construct() {
        $this->categories_list = Categories::select()->orderBy('category')->get();
        $this->branch_list = Branch::select()->orderBy('id')->get();
        $this->student_categories_list = StudentCategories::select()->orderBy('cat_id')->get();
    }

    public function index()
    {
        return view('pages.dashboard')
            ->with('categories_list', $this->categories_list)
            ->with('branch_list', $this->branch_list)
            ->with('student_categories_list', $this->student_categories_list);
    }
}
