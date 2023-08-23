<?php

namespace App\Http\Controllers;

use App\Models\expereince;
use App\Models\Person;
use Illuminate\Http\Request;
use LengthException;
use PhpParser\Node\Stmt\Foreach_;
use Ramsey\Uuid\Type\Integer;

class search extends Controller
{
    public function serachexpert($name) // expert
        {

 $arr=expereince::get('id');
$ar=[$arr];

 $arr2=Person::get('id');
 $ar2=[$arr2];

 $first=Person:: where('first_name','like','%'.$name.'%')->get();
foreach ($ar as $ar => $value) {
    foreach ($ar2 as $ar2 => $value2)
{
    if($value==$value2)

   // return $last =Person:: where('last_name','like','%'.$name.'%')->get();

 return  $first;
}
}
}}

//         $last =Person:: where('last_name','like','%'.$name.'%')->get();

//         $first=Person:: where('first_name','like','%'.$name.'%')->get();


    // return [$last,$first];



    //         echo $last;
    //     }
    //     for($i=0;$i<5;$i++)
    //     {
    //         if($a->value==$arr->value)
    //         echo $last;
    //     }

    // return [$last];
    // foreach ($b as  $value) {
    //     if(in_array($value,$arr))
    //     {

    //         echo $first;
    //     }



