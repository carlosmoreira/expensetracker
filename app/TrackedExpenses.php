<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackedExpenses extends Model
{
    protected $fillable = ['expense_id', 'cost'];
    protected $table = "trackedexpenses";

    protected $casts = [
        'cost' => 'double'
    ];

    public function expense(){
        return $this->belongsTo('App\Expense', 'expense_id');
    }

}
