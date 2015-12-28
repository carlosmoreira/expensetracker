<?php

namespace App\Http\Controllers;

use App\Expense;
use App\TrackedExpenses;
use DB;
use Faker\Provider\cs_CZ\DateTime;
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

    public function monthlyExpenses(Request $request, $month = null){

        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        $otherMonth = isset($month) && ($month > 0 && $month < 13) ;

        if($otherMonth){
            //Get a Specific Months Data
            $monthStart =  Carbon::create(date('Y'), $month, 1,0,0,0);
            $monthEnd = Carbon::create(date('Y'), $month, 1,0,0,0)->endOfMonth();

            $currentMonthTrackedExpenses = TrackedExpenses::where('created_at', '>=', $monthStart)
                ->where('created_at' , '<=' ,  $monthEnd)
                ->orderBy('id' , 'desc' )->get();

        }else{
            //Get current Months Data
            $currentMonthTrackedExpenses = TrackedExpenses::where('created_at', '>=', Carbon::now()->startOfMonth())
                ->where('created_at' , '<=' ,  Carbon::now()->endOfMonth())
                ->orderBy('id' , 'desc' )->get();
        }


        $expenses = Expense::where('active' , 1)->get();

        $e = [];
        $current = 0;
        foreach($expenses as $expense){
            //var_dump($expense->id);

            $e[$current]['expense'] = $expense;
            $e[$current]['monthlypayed'] = $this->findExpense($expense->id, $currentMonthTrackedExpenses);
            $current++;
        }

        return ['month' =>  ($otherMonth) ? $months[$month - 1] : Date('F') ,
            'payments' => $e,
            'year' => date('Y')
        ];

    }

    public function totalMonthlyExpenses(Request $request, $expenseId = null){

        $query = "select sum(cost) as Total, DATE_FORMAT( created_at , \"%M\") as Month
                            from trackedexpenses
                            where MONTH(created_at) in(1,2,3,4,5,6,7,8,9,10,11,12)
                            ";

        if(isset($expenseId)){
            $query .= "AND trackedexpenses.expense_id = ".$expenseId;
        }

        $query .= " group by MONTH(created_at)";

        return [
            'totalMonthly' => DB::select( $query ),
            'expenses' => Expense::all(['name', 'id'])
        ];

    }
}
