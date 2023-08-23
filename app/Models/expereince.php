<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expereince extends Model
{
    use HasFactory;
    protected $fillable = [
        'expert_id',
          'Specialises', 'Experience',
           'min', 'max', 'rate','times'
    ];
    public function people()
    {
        return $this->hasOne(Person::class,'people_expert_id');
    }
    public function peopletest2()
    {
        return $this->hasMany(Consultations::class,'people_expert_id');
    }
    public function favoirite_experience_id (){
        return $this->hasMany(favorite::class,'people_experience_id');
       }
       public function experttime (){
        return $this->hasMany(experttime::class);
       }
}
