<?php

namespace App\Http\Controllers;

trait trait_response
{
public function api_response($data=null,$message=null,$status=null)
{
$array =[
    'data'=>$data,
    'message'=>$message,
    'status'=>$status,
];
 return response($array,$status);
}
}
