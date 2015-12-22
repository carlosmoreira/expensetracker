<?php

use Illuminate\Database\Seeder;

class TrackedExpensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($m = 1; $m <= 12; $m++){
            for($e = 1; $e <= 9 ; $e++){
                $date = new DateTime($m.'/'.rand(20,26).'/2015');
                DB::table('trackedexpenses')->insert([
                    'expense_id' => $e,
                    'cost' => rand(50, 200),
                    'created_at' => date_format($date, 'Y-m-d H:i:s')
                ]);
            }
        }
    }
}
