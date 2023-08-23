<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\reserve;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Person::all();
    }
    public function indexexpert() // جلب الخبراء
    {
        return Person:: whereNotNull('Specialises') ->get();

    }
    public function indexconst() // البحث عن تصنيف معين
    {
        return Person:: where('Specialises','doctor') ->get();

    }

    public function serachexpert($name) // البحث عن ofdc معين
    {
        $last= Person:: whereNotNull('Specialises')-> where([['last_name','like','%'.$name.'%']]) ->get();
        $first= Person:: whereNotNull('Specialises')-> where('first_name','like','%'.$name.'%') ->get();


        return [$first,$last];

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return Person::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {

            // return Person::create($request->all());
            // return product::create([
            //     'name'=>'one',
            //     'slug'=>'one',
            //     'description '=>'this is one',
            //     'price'=>99.99,
            // ] );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        $id=Auth::user()->id;
      return  reserve::where('person_id',$id)->get();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }

    public static function expert()
    {
        $user=Auth::user();
        $m=$user->id;
      return  Person::find($user->id)->update(['expert_id'=>$m]);

    }
}
