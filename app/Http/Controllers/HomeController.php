<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentCategories;
use App\Models\Categories;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller

{
    public $categories_list = array();
    public $branch_list = array();
    public $student_categories_list = array();
    public $total_students_waiting = array();


    public function __construct() {
        $this->categories_list = Categories::select()->orderBy('category')->get();
        $this->branch_list = Branch::select()->orderBy('id')->get();
        $this->student_categories_list = StudentCategories::select()->orderBy('cat_id')->get();
    }

    public function index()
    {
        $conditions = array(
			'approved'	=> 0,
			'rejected'	=> 0
		);
        $total_students_waiting = DB::table('students')->where($conditions)->count();
        $total_books = DB::table('books')->count();
        $total_cat = DB::table('book_categories')->count();
        $total_students = DB::table('students')->count();
        return view('pages.dashboard')
            ->with('categories_list', $this->categories_list)
            ->with('branch_list', $this->branch_list)
            ->with('student_categories_list', $this->student_categories_list)
            ->with('total_students_waiting', $total_students_waiting)
            ->with('total_books', $total_books)
            ->with('total_students', $total_students)
            ->with('total_cat', $total_cat);
    }
}
