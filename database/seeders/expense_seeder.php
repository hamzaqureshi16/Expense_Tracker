<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\expense;

class expense_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        expense::factory(10)->create();
    }
}
