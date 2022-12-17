<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'wallet_num',
        'owner_wallet_id',
        'wallet_password',
        'wallet_value'];
        public function people(){
            return $this->belongsTo(Person::class,'owner_wallet_id') ;
        }
}
