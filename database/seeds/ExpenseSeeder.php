<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1, 10) as $index) {
        $faker = Faker::Create();
        DB::table('expenses')->insert([
         'description' => $faker->randomElement([ "Rent",
                                                "Utilities",
                                                "Groceries",
                                                "Dining out",
                                                "Transportation",
                                                "Entertainment",
                                                "Clothing",
                                                "Healthcare",
                                                "Insurance",
                                                "Education",
                                                "Debt payments",
                                                "Charitable donations",
                                                "Home maintenance",
                                                "Subscriptions",
                                                "Personal care"]),
         'price' => $faker->numberBetween(0, 100000),
         'date' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d')
        ]);
    }
    }
}