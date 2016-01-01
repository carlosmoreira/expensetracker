<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //
    protected $fillable = ['name', 'active'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];


//    public function trackedExpenses(){
//        return $this->belongsTo('App\TrackedExpenses', 'expense_id');
//    }
}
