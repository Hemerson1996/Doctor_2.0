<?php

namespace App\Http\Controllers\Receptionist;

use App\Admin\Doctor\Doctors;
use App\Admin\Receptionist\ReceptionistAvatar;
use App\Admin\Receptionist\ReceptionistBasic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReceptionistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receptionists = ReceptionistBasic::paginate(10);
        return view('Admin.Receptionist.receptionist-list',compact('receptionists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctors::all();
        return view('Admin.Receptionist.receptionist-creat',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $receptionist = new ReceptionistBasic();
        $receptionist->first_name = $request->first_name;
        $receptionist->last_name = $request->last_name;
        $receptionist->email = $request->email;
        $receptionist->number = $request->number;
        $receptionist->doctors_id = $request->doctor;
        $receptionist->save();

        $img = $request->file('img_avatar');
        $avatar = new ReceptionistAvatar();
        if (!empty($img)){
            $avatar->img_avatar = $request->file('img_avatar')->store('public/ADMIN/avatar_receptionist');

        }else{
            $avatar->img_avatar = null;
        }
        $receptionist->ReceptionistAvatar()->save($avatar);
        return redirect()->route('Admin.receptionist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receptionist = ReceptionistBasic::find($id);
        return view('Admin.Receptionist.receptionist-show',compact('receptionist'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receptionist = ReceptionistBasic::find($id);
        $doctors = Doctors::all();
        return view('Admin.Receptionist.receptionist-edit',compact('receptionist','doctors'));
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
        $receptionist = ReceptionistBasic::find($id);
        $receptionist->first_name = $request->first_name;
        $receptionist->last_name = $request->last_name;
        $receptionist->email = $request->email;
        $receptionist->number = $request->number;
        $receptionist->doctors_id = $request->doctor;
        $receptionist->save();

        $img = $request->file('img_avatar');
        if(!empty($img) || !$img == null){
            Storage::delete($receptionist->ReceptionistAvatar->img_avatar);
            ReceptionistAvatar::where('receptionist_basics_id',$receptionist->id)->update([
                'img_avatar' => $request->file('img_avatar')->store('public/ADMIN/avatar_receptionist'),
            ]);
        }

        return redirect()->route('Admin.receptionist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receptionist = ReceptionistBasic::find($id);
        if (!empty($receptionist) || $receptionist->ReceptionistAvatar->img_avatar <> null){
            Storage::delete($receptionist->ReceptionistAvatar->img_avatar);
        }
        $receptionist->delete();
        return redirect()->route('Admin.receptionist.index');
    }
}
