<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultations extends Model
{
    use HasFactory;
    protected $fillable=[

        'title','content','cost','rate','Specialises','person_id'
        ,'isfinished','person_expert_id',
    ];
    

    public function peopletest()
    {
        return $this->belongsTo(Person::class,'person_id');
    }
    public function peopletest2()
    {
        return $this->belongsTo(expereince::class,'person_expert_id');
    }
    public function reserve()
    {
        return $this->hasMany(reserve::class,'consultation_id');
    }

}
