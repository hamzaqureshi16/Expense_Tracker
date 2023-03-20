<?php

namespace App\Http\Controllers;

use App\Models\expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index()
    {
        return view('showexpense')->with('data',expense::orderBy('id','asc')->paginate(5));
    }

    public function create()
    {
        return view('addexpense');
    }

    public function store(Request $req){
        return dd(expense::where(
            'user_id', 5
        )->get(
            'description', 'amount', 'date'
        )
        );
        // $req->validate([
        //     'name' => 'required',
        //     'amount' => 'required',
        //     'date' => 'required',
        // ]);
        // $expense = new expense;
        // $expense->name = $req->name;
        // $expense->amount = $req->amount;
        // $expense->date = $req->date;
        // $expense->save();
        // return redirect()->route('data')->with('success','Expense Added Successfully');
    }
}

