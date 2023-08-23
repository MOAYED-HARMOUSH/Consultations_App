<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class experttime extends Model
{
    use HasFactory;
    protected $fillable = [

        'time_const',
        'date_const',
        'expert_id'
        ];
        public function people_id(){
            return $this->belongsTo(expereince::class,'expert_id') ;
        }
      
}
