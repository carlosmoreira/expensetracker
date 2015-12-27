<?php

namespace App\Http\Controllers;

use App\TrackedExpenses;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TrackedExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TrackedExpenses::paginate(25);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = \Validator::make(
            $request->all(),
            ['expense_id'=> 'required',
            'cost' => 'required' ]
        );
        if($validate->fails()){
            return ['Error' => $validate->errors()->all()];
        }else{
            //Remove all with current month
            if($request->has('trackedExpenseId')){
                $te = TrackedExpenses::findOrFail($request->get('trackedExpenseId'));
                if($te){
                    $te->fill($request->all());
                    $te->save();
                    return ['Success' => 'Ok'];
                }
            }

            $te = new TrackedExpenses();
            if($request->has('month')){
                //$date = \DateTime::createFromFormat( 'Y-m-d' , date('Y') . '-' . $request->get('month') . '00 00:00:00');
                //var_dump($date->getTimestamp());

                $date = '2015-0'.($request->get('month') + 1).'-00 00:00:00';



                $te->created_at = $date;

            }
            $te->expense_id = $request->get('expense_id');
            $te->cost = $request->get('cost');
            $te->save();
            return ['Success' => 'Ok', 'id' => $te->id];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $te = TrackedExpenses::findOrFail($id);
        $te->fill($request->all());
        $te->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
