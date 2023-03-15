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
<div class="container">
    <div class="row">
        <div class="col-md-row">
            <table class="bg-primary text-light" >
                <tr>
                    <td>ID</td>
                    <td>description</td>
                    <td>date</td>
                    <td>amount</td>
                    <td>category</td>
                    <td>transaction type</td>
                    <td>user id</td>
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
                    </tr>
                    
                @endforeach
            </table>
        </div>
    </div>
    <div style="padding:10px">{{ $data->links() }}</div>    
</div>

@endsection