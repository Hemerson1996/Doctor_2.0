<?php

namespace App\Admin\Patients;

use Illuminate\Database\Eloquent\Model;

class PatientMedical extends Model
{
    protected $fillable = ['height','weight','blood','blood_pressure','pulse','respiration','allergy','diet'];
}
