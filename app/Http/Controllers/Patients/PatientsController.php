<?php

namespace App\Http\Controllers\Patients;

use App\Admin\Patients\PatientAvatar;
use App\Admin\Patients\PatientBasic;
use App\Admin\Patients\PatientMedical;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = PatientBasic::paginate(10);
        return view('Admin.Patients.patient-list',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Patients.patient-creat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $basic = new PatientBasic();
        $basic->first_name = $request->first_name;
        $basic->last_name = $request->last_name;
        $basic->age = $request->age;
        $basic->gender = $request->gender;
        $basic->email = $request->email;
        $basic->number = $request->number;
        $basic->address = $request->address;
        $basic->save();

        $medical = new PatientMedical();
        $medical->height = $request->height;
        $medical->weight = $request->weight;
        $medical->blood = $request->blood;
        $medical->blood_pressure = $request->blood_pressure;
        $medical->pulse = $request->pulse;
        $medical->respiration = $request->respiration;
        $medical->allergy = $request->allergy;
        $medical->diet = $request->diet;

        $img = $request->file('img_avatar');
        $avatar = new PatientAvatar();
        if (!empty($img)){
            $avatar->img_avatar = $request->file('img_avatar')->store('public/ADMIN/avatar_patient');

        }else{
            $avatar->img_avatar = null;
        }
        $basic->PatientAvatar()->save($avatar);
        $basic->PatientMedical()->save($medical);

        return redirect()->route('Admin.patient.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = PatientBasic::find($id);
        return view('Admin.Patients.patient-show',compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = PatientBasic::find($id);
        return view('Admin.Patients.patient-edit',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patient = PatientBasic::find($id);
        $patient->first_name = $request->first_name;
        $patient->last_name = $request->last_name;
        $patient->gender = $request->gender;
        $patient->Age = $request->age;
        $patient->email = $request->email;
        $patient->number = $request->number;
        $patient->address = $request->address;
        $patient->save();

        PatientMedical::where('patient_basics_id',$patient->id)->update([
            'height' => $request->height,
            'weight' => $request->weight,
            'blood' => $request->blood,
            'blood_pressure' => $request->blood_pressure,
            'pulse' => $request->pulse,
            'respiration' => $request->respiration,
            'allergy' => $request->allergy,
            'diet' => $request->diet
        ]);

        $img = $request->file('img_avatar');
        if(!empty($img) || !$img == null){
            Storage::delete($patient->PatientAvatar->img_avatar);
            PatientAvatar::where('patient_basics_id',$patient->id)->update([
            'img_avatar' => $request->file('img_avatar')->store('public/ADMIN/avatar_patient'),
        ]);
    }

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patients = PatientBasic::find($id);
        if (!empty($patients) || $patients->PatientAvatar->img_avatar <> null){
            Storage::delete($patients->PatientAvatar->img_avatar);
        }
        $patients->delete();
        return redirect()->route('Admin.patient.index');
    }
}
