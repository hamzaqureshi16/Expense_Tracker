@extends('layouts.app')
@section('content')
<style>
    
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        border-radius: 15px;
    }
    th, td {
        padding: 15px;
        text-align: left;
    }
    table#t01 tr:nth-child(even) {
        background-color: #eee;
    }
    table#t01 tr:nth-child(odd) {
       background-color: #fff;
    }
    table#t01 th {
        background-color: black;
        color: white;
    }

</style>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-row">
            <table class="bg-gray text-dark" >
                <tr>
                    <td>ID</td>
                    <td>description</td>
                    <td>date</td>
                    <td>amount</td>
                    <td>category</td>
                    <td>transaction type</td>
                    <td>user id</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                @foreach ($data as $datum )
                    <tr>
                        <td>{{ $datum->id }}</td>
                        <td>{{ $datum->description }}</td>
                        <td>{{ $datum->date }}</td>
                        <td>{{ $datum->amount }}</td>
                        <td>{{ $datum->category }}</td>
                        <td>{{ $datum->transaction_mode }}</td>
                        <td>{{ $datum->user_id }}</td>
                        <td>
                            <a href="{{ route('expense.edit', $datum->id) }}"><button class="rounded btn btn-primary m-2" > Edit</button></a>
                        </td>
                        <td>
                            <form action="{{ route('expense.delete', $datum->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="rounded btn bg-primary text-light m-2" > Delete</button>
                            </form>
                    </tr>
                    
                @endforeach
            </table>
        </div>
    </div>
    
    <a href="{{ route('expense.add') }}"><button class="rounded btn btn-primary m-2" > Add Expense</button></a>
    <div style="padding:10px">{{ $data->links() }}</div>    
</div>

@endsection