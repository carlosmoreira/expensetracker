<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //
    protected $fillable = array('name');

//    public function trackedExpenses(){
//        return $this->belongsTo('App\TrackedExpenses', 'expense_id');
//    }
}
