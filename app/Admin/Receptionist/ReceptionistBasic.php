<?php

namespace App\Admin\Receptionist;

use App\Admin\Doctor\Doctors;
use Illuminate\Database\Eloquent\Model;

class ReceptionistBasic extends Model
{
    protected $fillable = ['first_name','last_name','email','number'];
    public function ReceptionistAvatar(){
        return $this->hasOne(ReceptionistAvatar::class,'receptionist_basics_id','id');
    }
    public function Doctor(){
        return $this->belongsTo(Doctors::class, 'doctors_id', 'id');
    }
}
