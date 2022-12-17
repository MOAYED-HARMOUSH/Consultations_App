<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Person extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'first_name',
        'last_name',
        'password',
        'img_bath',
        'country', 'city', 'region', 'email',
         'password', 'gender', 'birth_date',
          'Specialises', 'Experience',
           'min', 'max', 'rate', 'id'
    ];
public function wallet(){
    return $this->hasOne(wallet::class,'owner_wallet_id');
}
public function phones(){
    return $this->hasMany(phone::class,'owner_phone_id');
}
public function Consultation() //for make Consultation from table Consultation >>>not important<<<
{
    return $this->hasMany(Consultations::class);

}
public function Consultation2() //for make  Consultation from table user directly
{
    return $this->hasMany(Consultations::class,'person_notexpert_id');

}
}
