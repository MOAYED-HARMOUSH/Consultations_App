<?php

namespace App\Http\Controllers;

use App\Models\conversition;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversitionController extends Controller
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
    public function create(Request $request)
    {
         $user=Auth::user();
        $mm=$user->id;



conversition::create([
    'message'=>$request->message,
    'people_id'=> $mm,
    'people_expert_id'=>$request->person_expert_id,
]);
return 'sent succesfully';



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

    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\conversition  $conversition
    //  * @return \Illuminate\Http\Response
    //  */
    public function show(conversition $conversition)
    {
        $user=Auth::user();
        $mm=$user->id;


       // $ab=conversition::where('people_id',$mm)->find($mm);

      $ac=conversition::find($mm)->where('people_expert_id',$mm)->get('people_id');
      $bc=conversition::find($mm)->where('people_id',$mm)->get('people_expert_id');

     $people=Person::find($ac)->whereNotNull('id');
 // $p=   $people->whereNotNull('id')->get('id');

   $people2=Person::find($bc)->whereNotNull('id');

   $x=conversition::find($mm)->where('people_expert_id',$mm)->get('message');
   $xx=conversition::find($mm)->where('people_id',$mm)->get('message');

      //  ->get()->people_expert_id;
//  $id[]=conversition::get('people_id') ;
//  $idd=conversition::where('people_id')->last();
 //$collection = sizeof($id);
//$c=Person::find($ac)->whereNotNull('first_name')->get();

//$c->find('first_name')->get();
//$p=Person::where('id','$ac')->get('first_name');



//$d=Person::where('first_name',$c)->get();

 //$a=Person::find($ac)->where('id',$arr)->get(['first_name','last_name']);
// $aa=conversition::find($mm)->where('people_expert_id',$mm)->get();

 //$b=conversition::find($mm)->id;

// return [$c,$d,$a,$aa];
return  [[$people,$x],[$people2,$xx]];

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\conversition  $conversition
     * @return \Illuminate\Http\Response
     */
    public function edit(conversition $conversition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\conversition  $conversition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, conversition $conversition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\conversition  $conversition
     * @return \Illuminate\Http\Response
     */
    public function destroy(conversition $conversition)
    {
        //
    }
}
