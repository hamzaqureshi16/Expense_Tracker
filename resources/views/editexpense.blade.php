@extends('layouts.app')
@section('content')
<style>
        
        .form-group {
            padding: 10px;
        }
        
        form {
            border: 3px solid #f1f1f1;
            border-radius: 15px;
            padding: 10px;
        }

        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 10%;
        }
        .container {
            padding: 16px;
            box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.14);
            border-radius: 15px;
        }
        
       
</style>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Edit Expense</h1>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('expense.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                <div class="form-group">
                    <label for="description">Description<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ $data->description }}" placeholder="Enter description" required>
                </div>
                
                <div class="form-group">
                    <label for="date">Date<sup class="text-danger">*</sup></label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ $data->date }}" placeholder="Enter date" required>
                </div>
                
                <div class="form-group">
                    <label for="amount">Amount<sup class="text-danger">*</sup></label>
                    <input type="number" class="form-control" value="{{ $data->amount }}" id="amount" name="amount" placeholder="Enter amount" required>
                </div>
                
                <div class="form-group">
                    <label for="category">Category<sup class="text-danger">*</sup></label>
                    <select type="text" class="form-control" id="category" name="category" value = "{{ $data->category }}" placeholder="Enter category" required>
                        <option value="food">Food</option>
                        <option value="travel">Travel</option>
                        <option value="entertainment">Entertainment</option>
                        <option value="shopping">Shopping</option>
                        <option value="others">Others</option> 
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="transaction_mode">Transaction Mode<sup class="text-danger">*</sup></label>
                    <select type="text" class="form-control" value="{{ $data->transaction_mode }}" id="transaction_mode" name="transaction_mode" placeholder="Enter transaction mode" required>
                        <option value="cash">Cash</option>
                        <option value="card">Card</option>
                        <option value="netbanking">Netbanking</option>
                        <option value="others">Others</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
            
            </form>
        </div>
    </div>
</div>

@endsection