<?php

namespace App\Http\Controllers;

use App\Models\Consultations;
use App\Models\reserve;
use App\Models\wallet;
use DateTime;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Ramsey\Uuid\Type\Integer;

use function PHPUnit\Framework\returnSelf;

class ConsultationsController extends Controller
{ use trait_response;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function see_consultations()
    {
        $array= [
            'medical',
            'family',
            'psychology',
            'other',
            'finance'
        ];

        return $this->api_response($array,'ok',200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search_about_consultations($name)
    {
        $kind=[
            'medical',
            'family',
            'psychology',
            'other',
            'finance'
        ];
        if(in_array($name,$kind))
        return $this->api_response($name,'ok',200);
        else
        return $this->api_response(null,'not found',400);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function makeConsultation(Request $request)
    {$mo=$request->person_expert_id;

        $user=Auth::user();
        $mn=$user->id;



        return Consultations::create( [
        'title'=> $request->title,
        'content'=>$request->content,
        'isfinished'=>$request->isfinished,
        'rate'=>$request->rate,
        'cost'=>1000,
        'Specialises'=>$request->Specialises,
        'person_id'=> $mn,
        'person_expert_id'=>$mo

        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultations  $consultations
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request)
    {$expert_id=$request->person_expert_id;

        $user=Auth::user();
        $person_id=$user->id;

     $d=    wallet::where('owner_wallet_id',$person_id)->sum('wallet_value');
     if($d>=1000)
     $e= $d -1000;
else
return $this->api_response(null,'isnt enough',400);

  $w=  wallet::where('owner_wallet_id',$person_id)
     ->update(['wallet_value'=> $e]);
    $r= wallet::where('owner_wallet_id',$person_id)->get('wallet_value');




    $dd=wallet::where('owner_wallet_id',$expert_id)->sum('wallet_value');
// return $r;

$id= Consultations::where('person_id',$person_id)->where('person_expert_id', $expert_id)->sum('id');


   $cons= Consultations::where('person_id',$person_id)->where('person_expert_id', $expert_id)->sum('isfinished');
   $dat= reserve::where('consultation_id',$id)->sum('consultations_date');
   $now=Carbon::now()->format('Ymd');
//return [$now,$dat];

$datint = (int)$dat;
$nowint = (int)$now;


if($nowint>$datint)

{ $cons=1;
    if($cons==1)
        {$ee= $dd +1000;
        $ww=   wallet::where('owner_wallet_id',$expert_id)
         ->update(['wallet_value'=> $ee]);
         $rr=   wallet::where('owner_wallet_id',$expert_id)->get('wallet_value');
        }
        return [$r,$rr];

    }
    else
    return $r;



  //  return $this->api_response(null,'paid successfully',200);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultations  $consultations
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultations $consultations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultations  $consultations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultations $consultations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultations  $consultations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultations $consultations)
    {
        //
    }
}
