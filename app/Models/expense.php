<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'amount',
        'date',
        'user_id',
        'category',
        'transaction_mode'
        

    ];

    protected $table = 'expenses';
}
