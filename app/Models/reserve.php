<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserve extends Model
{
    use HasFactory;
     protected $fillable=[
        'id','consultations_content','consultation_id','consultations_date','consultations_place'
        ,'person_notexpert_id'
        ,'consultations_period','person_expert_id',
    ];
    public function consultation()
    {
        return $this->belongsTo(Consultations::class,'consultation_id');
    }
}
