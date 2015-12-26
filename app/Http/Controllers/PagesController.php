<?php

namespace App\Http\Controllers;

use App\Expense;
use App\TrackedExpenses;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
class PagesController extends Controller
{


    private function findExpense($id, $monthlyExp){
        foreach($monthlyExp as $m){
            //var_dump($m);
            if($id == $m->expense_id){
                return $m;
            }
        }
        return null;
    }

    public function monthlyExpenses(){

        $expenses = Expense::where('active' , 1)->get();

        $currentMonthTrackedExpenses = TrackedExpenses::where('created_at', '>=', Carbon::now()->startOfMonth())->orderBy('id' , 'desc' )->get();

        $e = [];
        $current = 0;
        foreach($expenses as $expense){
            //var_dump($expense->id);

            $e[$current]['expense'] = $expense;
            $e[$current]['monthlypayed'] = $this->findExpense($expense->id, $currentMonthTrackedExpenses);
            $current++;
}

        return ['month' => Date('F'),
                    'payments' => $e
        ];

//        return Expense::LeftJoin('TrackedExpenses', 'Expenses.id', '=' , 'TrackedExpenses.expense_id')
//                ->where('TrackedExpenses.created_at', '>=', Carbon::now()
//                ->startOfMonth())
//                ->get();
    }

}
