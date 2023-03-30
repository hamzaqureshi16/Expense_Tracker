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

    public function edit($id){
        return view('editexpense')->with('data',expense::find($id));
    }


    public function delete($id){
        $data = expense::find($id);
        $data->delete();
        return redirect()->route('data')->with('success','Expense Deleted Successfully');
    }

    public function update(Request $req){
       
        $data = expense::find($req->id);
       

        
        $validated = $req->validate([
            'description' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'category' => 'required',
            'transaction_mode' => 'required'
        ]);

        $data->description = $validated['description'];
        $data->amount = $validated['amount'];
        $data->date = $validated['date'];
        $data->category = $validated['category'];
        $data->transaction_mode = $validated['transaction_mode'];
        $data->save();

        return redirect()->route('data')->with('success','Expense Updated Successfully');
    }

    public function create()
    {
        return view('addexpense');
    }

    public function store(Request $req){
       
        $validated = $req->validate([
            'description' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'category' => 'required',
            'transaction_mode' => 'required'
        ]);
    
        expense::create([
            'description' => $validated['description'],
            'amount' => $validated['amount'],
            'date' => $validated['date'],
            'user_id' => Auth::user()->id,
            'category' => $validated['category'],
            'transaction_mode' => $validated["transaction_mode"]

        ]);
        
        return redirect()->route('data')->with('success','Expense Added Successfully');
    }
}

