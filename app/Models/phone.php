<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'country_code',
        'phone',
        'owner_phone_id'];
        public function people(){
            return $this->belongsTo(Person::class,'owner_phone_id') ;
        }
}
