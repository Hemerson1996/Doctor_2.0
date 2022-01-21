<?php

namespace App\Http\Controllers\Doctor;

use App\Admin\Doctor\Avatar;
use App\Admin\Doctor\Doctors;
use App\Admin\Doctor\Week;
use App\Http\Controllers\Controller;
use Faker\Core\File;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctors::paginate(10);
        return view('Admin.Doctors.list',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Doctors.creat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required',

        ]);
        $doctor = new Doctors();
        $doctor ->first_name = $request->first_name;
        $doctor ->last_name = $request->last_name;
        $doctor ->email = $request->email;
        $doctor ->number = $request->number;
        $doctor ->title = $request->title;
        $doctor ->degree = $request->degree;
        $doctor ->experience = $request->experience;
        $doctor ->fess = $request->fess;
        $doctor ->time_slots = $request->time_slots;
        $doctor ->from_time = $request->from_time;
        $doctor ->from_to = $request->from_to;
        $doctor->save();

        $week = new Week();
        $week->sun = $request->sun;
        $week->mon = $request->mon;
        $week->tue = $request->tue;
        $week->wen = $request->wen;
        $week->thu = $request->thu;
        $week->fri = $request->fri;
        $week->sat = $request->sat;

        $img = $request->file('img_avatar');
        $avatar = new Avatar();
        if (!empty($img)){
            $avatar->img_avatar = $request->file('img_avatar')->store('public/avatar_doctors');

        }else{
            $avatar->img_avatar = null;
        }
        $doctor->AvatarDoctor()->save($avatar);
        $doctor->WeekDoctor()->save($week);

        return redirect()->route('Admin.doctor.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctors::find($id);
        return view('Admin.Doctors.doctor_show',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctors::find($id);
        return view('Admin.Doctors.doctor-edit',compact('doctor'));
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

        $doctor = Doctors::find($id);
        $doctor ->first_name = $request->first_name;
        $doctor ->last_name = $request->last_name;
        $doctor ->email = $request->email;
        $doctor ->number = $request->number;
        $doctor ->title = $request->title;
        $doctor ->degree = $request->degree;
        $doctor ->experience = $request->experience;
        $doctor ->fess = $request->fess;
        $doctor ->time_slots = $request->time_slots;
        $doctor ->from_time = $request->from_time;
        $doctor ->from_to = $request->from_to;
        $doctor->save();

        Week::where('doctors_id',$id)->update([
            'sun' => $request->sun,
            "mon" => $request->mon,
            "tue" => $request->tue,
            "wen" => $request->wen,
            "thu" => $request->thu,
            "fri" => $request->fri,
            "sat" => $request->sat
        ]);

        $img = $request->file('img_avatar');
        if (!empty($img) || !$img == null){
            Avatar::where('doctors_id',$id)->update([
                "img_avatar" => $request->file('img_avatar')->store('public/avatar_doctors')
            ]);
        }

        return redirect()->route('Admin.doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctors::find($id);
        if(!empty($doctor->AvatarDoctor->img_avatar)|| $doctor->AvatarDoctor->img_avatar <> null ){
            Storage::delete($doctor->AvatarDoctor->img_avatar);
        }
        $doctor->delete();
        return redirect()->route('Admin.doctor.index');
    }
}
