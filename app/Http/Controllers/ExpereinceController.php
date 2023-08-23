<?php

namespace App\Http\Controllers;

use App\Models\expereince;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use App\Models\Person;
use App\Http\Controllers\PersonController;

use function PHPUnit\Framework\returnSelf;

class ExpereinceController extends Controller
{use HasApiTokens;
    use trait_response;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getinformations($id)
    {
        $last= [Person::    whereNotNull('expert_id')->
        where('expert_id',$id)->get(['first_name','last_name','img_bath','country']),
        expereince::    whereNotNull('id')->
        where('id',$id)->get(['rate','max','min','Specialises','Experience'])];


return $last;

// $last= Person::    whereNotNull('expert_id')->
// where('expert_id',$id)->get(['first_name','last_name','img_bath','country']);
// $laast= expereince::    whereNotNull('id')->
// where('id',$id)->get(['rate','max','min','Specialises','Experience']);


// return[$last,$laast];
    }

    public function indexbyconsultation($spec)
    {
        $data= expereince::where('Specialises',$spec)->get(['Specialises','Experience','min','max','rate']);
        return $this->api_response($data,'ok',200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $user=Auth::user();
        $user_id=$user->id;

        $user_id_from_people= Person::find($user_id)->id;
        $expert_id_from_people= Person::find($user_id)->expert_id;

        if($expert_id_from_people != null )
        {
                 return $this->api_response(null,'expert already',400);
        }
            else
         {
             $ceate_expert_info= expereince::create($request->all());
             $expert_info_id=$ceate_expert_info->id;
         }

    $v=Person::find($user_id_from_people);
    $v-> update(['expert_id'=> $expert_info_id]);

                 return $this->api_response($v,'created succesfully',200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function expert(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\expereince  $expereince
     * @return \Illuminate\Http\Response
     */
    public function show(expereince $expereince)
    {
        //
    }

    public function search($name)
    {




        $last= Person::    whereNotNull('expert_id')-> where('first_name','like','%'.$name.'%');

       $l= $last->get(['first_name','last_name','img_bath','country','city','gender','birth_date']);


        $first=  Person::  whereNotNull('expert_id')-> where('last_name','like','%'.$name.'%');
      $f=  $first->get(['first_name','last_name','img_bath','country','city','gender','birth_date']);
       return $this->api_response([$l,$f],'ok',200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\expereince  $expereince
     * @return \Illuminate\Http\Response
     */
    public function edit(expereince $expereince)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\expereince  $expereince
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, expereince $expereince)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\expereince  $expereince
     * @return \Illuminate\Http\Response
     */
    public function destroy(expereince $expereince)
    {
        //
    }
}
