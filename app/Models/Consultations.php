<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultations extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'title','content','cost','rate','Specialises','person_notexpert_id'
        ,'isfinished','person_expert_id',
    ];
    public function people()
    {
        return $this->belongsTo(Person::class);
    }

    public function peopletest()
    {
        return $this->belongsTo(Person::class,'person_notexpert_id');
    }
    public function reserve()
    {
        return $this->hasMany(reserve::class,'consultation_id');
    }

}
