<?php

namespace App\Http\Controllers;

use App\Models\expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        return view('index')->with('data',expense::orderBy('id','asc')->paginate(5));
    }
}
