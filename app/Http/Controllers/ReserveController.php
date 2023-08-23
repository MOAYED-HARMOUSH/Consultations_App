<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Consultations;
use App\Models\reserve;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function show(reserve $reserve)
    {
        $id=Auth::user()->id;
      return  reserve::where('person_expert_id',$id)->get();

    }
    public function makereserve(Request $request)
    {$mo=$request->person_expert_id;

        $user=Auth::user();



        return reserve::create( [
        'consultations_date'=> $request->consultations_date,
        'consultations_place'=>$request->consultations_place,
        'consultations_period'=>$request->consultations_period,
        'consultations_content'=>$request->consultations_content,
        'person_id'=> $user->id,
        'person_expert_id'=>$mo,
        'consultation_id'=>$request->consultation_id

        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function edit(reserve $reserve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reserve $reserve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function destroy(reserve $reserve)
    {
        //
    }
}
