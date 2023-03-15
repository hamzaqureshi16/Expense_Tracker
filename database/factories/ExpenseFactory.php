<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $expense_categories = config('expense.expense_categories');
        $payment_categories = config('expense.expense_categories');
        return [
            'description' => $this->faker->sentence,
            'date' => $this->faker->date,
            'amount' => $this->faker->numberBetween(100,10000),
            'category' => $this->faker->randomElement($expense_categories),
            'transaction_mode' => $this->faker->randomElement($payment_categories),
            'user_id' => $this->faker->numberBetween(1, 10),

        ];
    }
}
