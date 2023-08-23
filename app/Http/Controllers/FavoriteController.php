<?php

namespace App\Http\Controllers;

use App\Http\Controllers\auth as ControllersAuth;
use App\Models\favorite;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $id)
    {   $user=Auth::user();
        $m=$user->id;
        $n=$id->people_experience_id;
        $v='already added';

  //    $mmm=favorite::where('people_id',$m)->where('people_experience_id',$m)->get('id');

// if(!$mmm)

//return $v;
// else
      return favorite::create([
        'people_id'=>$m,

        'people_experience_id'=> $n
    ]);

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
     * @param  \App\Models\favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(favorite $favorite)
    {
        $user=Auth::user();
        $m=$user->id;


 return $mmm=favorite::where('people_id',$m)->get();

// if(!$mmm)

//return $v;
// else
    //   return favorite::create([
    //     'people_id'=>$m,

    //     'people_experience_id'=> $n
    // ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(favorite $favorite)
    {
        //
    }
}
