<?php

namespace App\Http\Controllers;

use App\Models\wallet;
use Hamcrest\Type\IsInteger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

use function PHPUnit\Framework\isNull;

class WalletController extends Controller
{use HasApiTokens;
    use trait_response;
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
    public function create_wallet(Request $request)
    {
        $user=Auth::user();
        $value=$request->wallet_value;
        $mn=$user->id;
       // $w=  wallet::where('owner_wallet_id',$mn)->get('id');

        if($value<1000)
       { return $this->api_response(null,'value isnt enough',400);}
        else
       { $wallet =wallet::create( ['wallet_value'=> $request->wallet_value,
        'wallet_num'=>$request->wallet_num,
        'password'=>$request->password,
        'owner_wallet_id'=> $user->id
        ]);
        return $this->api_response($wallet,'added succesfully',200);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function addvalue(Request $request)
    {
        $user=Auth::user();
        $mn=$user->id;
        $value=$request->wallet_value;

        $sum=    wallet::where('owner_wallet_id',$mn)->sum('wallet_value');
      $all=$sum+$value;

        $wallet =wallet::where('owner_wallet_id',$mn)->update(
             ['wallet_value'=> $all,


        ]);
        return $a=    wallet::where('owner_wallet_id',$mn)->get('wallet_value');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function edit(wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(wallet $wallet)
    {
        //
    }
}
