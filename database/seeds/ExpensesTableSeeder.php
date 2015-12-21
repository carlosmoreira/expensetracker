<?php

use Illuminate\Database\Seeder;

class ExpensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($x = 1; $x < 10; $x++){
            DB::table('expenses')->insert([
                'name' => str_random(10),
                'active' => 1
            ]);
        }
    }
}
