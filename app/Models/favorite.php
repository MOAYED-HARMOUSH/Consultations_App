<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    use HasFactory;
    protected $fillable = [

        'people_experience_id',
        'people_id',
        ];
        public function people_id(){
            return $this->belongsTo(Person::class,'people_id') ;
        }
        public function people_experience_id(){
            return $this->belongsTo(expereince::class,'people_experience_id') ;
        }
}
