<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class IncomeSeeder extends Seeder
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
        DB::table('incomes')->insert([
         'description' => $faker->randomElement([ "Salary",
                                                    "Freelancing",
                                                    "Rental income",
                                                    "Investment dividends",
                                                    "Business profits",
                                                    "Consulting fees",
                                                    "Royalties",
                                                    "Commission earnings",
                                                    "Interest income",
                                                    "Pension or retirement benefits",
                                                    "Social security benefits",
                                                    "Alimony or child support",
                                                    "Selling products online",
                                                    "Gig economy earnings (e.g., Uber, Lyft)",
                                                    "Cash gifts or inheritance"]),
         'price' => $faker->numberBetween(0, 100000),
         'date' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d')
        ]);
    }
    }
}