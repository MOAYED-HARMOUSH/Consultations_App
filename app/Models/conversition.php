<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conversition extends Model
{
    use HasFactory;
    protected $fillable=['people_id','people_expert_id','message'];

   public function people (){
    return $this->belongsTo(people::class);
   }
}
