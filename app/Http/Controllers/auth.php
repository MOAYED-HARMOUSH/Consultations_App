<?php

namespace App\Http\Controllers;

use App\Models\expereince;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class auth extends Controller
{ use HasApiTokens;
    public function register(Request $request)
    {$fields=$request->validate(
      [
          'first_name'=> 'required|string',
          'last_name'=> 'required|string',
          'img_bath'=> 'nullable|string',
          'country'=> 'required|string',
          'city'=> 'required|string',
          'gender'=> 'required|string',
          'birth_date'=> 'nullable|string', //مؤقتا // مؤثتا سترينغ
         // 'expert'=>'required|string', // مؤقتا
        //   'Specialises'=> 'nullable|string',// مؤثتا سترينغ
        //   'Experience'=> 'nullable|string',
         // 'times'=> 'nullable|string',
          'email'=> 'required|string|unique:people,email',
          'password'=> 'required|string|confirmed',

      ]
      );
  $people=Person::create(
      [
          'first_name'=>$fields['first_name'],
          'email'=>$fields['email'],
          'password'=>bcrypt($fields['password'])  ,
          'last_name'=>$fields['last_name'],
          'img_bath'=>$fields['img_bath'],
          'country'=>$fields['country'],
          'city'=>$fields['city'],
          'gender'=>$fields['gender'],
          'birth_date'=>$fields['birth_date'],
          //'expert'=>$fields['expert'],
        //   'Specialises'=>$fields['Specialises'],
        //   'Experience'=>$fields['Experience'],
        //   'times'=>$fields['times'],

      ]

      );

            //'expert'=>$fields['expert'],
          //   'Specialises'=>$fields['Specialises'],
          //   'Experience'=>$fields['Experience'],
          //   'times'=>$fields['times'],



        


        $token=$people->createToken('myapptoken')->plainTextToken;
        $response=[
            'user'=>$people,
            'token'=>$token,
        ];




  return response($response,201);
    }



    public function login(Request $request)
    {$fields=$request->validate(
      [
          'email'=> 'required|string',
          'password'=> 'required|string',

      ]
      );
  $people=Person::where('email',$fields['email'])->first();
  if(!$people || !Hash::check($fields['password'],$people->password)){
  return response([
      'message'=>"bad",

  ],401);
  }

      $token=$people->createToken('myapptoken')->plainTextToken;
      $response=[
          'user'=>$people,
          'token'=>$token,
      ];
  return response($response,201);
    }
    public function logout(Request $request)
    { $request->user()->tokens()->delete();
      return [
          'message'=>'logged out',
      ];

    }
  }
