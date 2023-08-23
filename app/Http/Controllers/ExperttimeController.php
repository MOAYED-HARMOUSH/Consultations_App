<?php

namespace App\Http\Controllers;

use App\Models\experttime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperttimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $user=Auth::user();
        $m=$user->id;
    return  experttime::create([
        'expert_id'=>$m,
        'time_const'=>$request->time_const,
        'date_const'=>$request->date_const,

      ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showdates($id)
    {
        $user=Auth::user();
        $m=$user->id;


 return $mmm=experttime::where('expert_id',$id)->get();

    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\experttime  $experttime
     * @return \Illuminate\Http\Response
     */
    public function show(experttime $experttime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\experttime  $experttime
     * @return \Illuminate\Http\Response
     */
    public function edit(experttime $experttime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\experttime  $experttime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, experttime $experttime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\experttime  $experttime
     * @return \Illuminate\Http\Response
     */
    public function destroy(experttime $experttime)
    {
        //
    }
}
