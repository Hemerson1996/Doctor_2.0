<?php

namespace App\Admin\Doctor;

use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    protected $fillable = ['first_name','last_name','email','number','title','degree','experience','fess','time_slots','from_time','from_to'];

    public function WeekDoctor(){
        return $this->hasOne(Week::class);
    }
    public function AvatarDoctor(){
        return $this->hasOne(Avatar::class);
    }
}
