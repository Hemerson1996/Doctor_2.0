<?php

namespace App\Admin\Patients;

use Illuminate\Database\Eloquent\Model;

class PatientBasic extends Model
{
    protected $fillable =['first_name','last_name','age','email','number','address','gender'];
    public function PatientMedical(){
        return $this->hasOne(PatientMedical::class,'patient_basics_id','id');
    }
    public function PatientAvatar(){
        return $this->hasOne(PatientAvatar::class,'patient_basics_id','id');
    }
}
