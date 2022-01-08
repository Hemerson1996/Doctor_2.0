@extends('Admin.Dashboard.index')
@section("content")

<div class="container">
    <div class="row">
        <div class="d-flex justify-content-between mt-4">
            <b>DOCTOR PROFILE</b>
            <nav aria-label="breadcrumb" id="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('Admin.doctor.index')}}">Doctors</a></li>
                    <li class="breadcrumb-item">Doctor Profile</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-4 me-4">
            <div class="card">
                <img src="https://www.igemc.com.br/wp-content/uploads/2018/04/fundoespecialidades-1.jpg?id=30" class="card-img-top" height="150" style="background:#d4dbf9">
                <div class="card-body">
                    <img src="{{($doctor->AvatarDoctor->img_avatar == null)? asset('/img-avatar-padrao/foto-perfil-masc.png'): Storage::url($doctor->AvatarDoctor->img_avatar)}}" class="rounded-circle" width="75" height="75" alt="Responsive image">
                    <div class="card-title">{{$doctor->first_name." ".$doctor->last_name}}</div>
                    <div class="card-text">
                        <small class="text-muted">{{$doctor->title}}.</small>
                    </div>
                    <div class="card-text">
                        <a href="{{route('Admin.doctor.edit',[$doctor->id])}}" class="btn btn-primary btn-sm">Edit Profile <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <div class="card-title"><b>Personal Information</b></div>
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>Full Name:</th>
                            <td>{{$doctor->first_name." ".$doctor->last_name}}</td>
                        </tr>
                        <tr>
                            <th>Contact No:</th>
                            <td>{{$doctor->number}}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{$doctor->email}}</td>
                        </tr>
                        <tr>
                            <th>Degree:</th>
                            <td>{{$doctor->degree}}</td>
                        </tr>
                        <tr>
                            <th>Experience:</th>
                            <td>{{$doctor->experience}} Year</td>
                        </tr>
                        <tr>
                            <th>Fees:</th>
                            <td>{{$doctor->fess}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <div class="card-title"><b>Doctor Available Day And Time</b></div>
                    <p>Available Day</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sun" name="sun" {{(!$doctor->WeekDoctor->sun == null)? 'checked' : ''}} disabled>
                        <label class="form-check-label" for="sun">Sub</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="mon" name="mon" {{(!$doctor->WeekDoctor->mon == null)? 'checked' : ''}} disabled>
                        <label class="form-check-label" for="mon">Mon</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tue" name="tue" {{(!$doctor->WeekDoctor->tue == null)? 'checked' : ''}} disabled>
                        <label class="form-check-label" for="tue">Tue</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="wen" name="wen" {{(!$doctor->WeekDoctor->wen == null)? 'checked' : ''}} disabled>
                        <label class="form-check-label" for="wen">Wen</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="thu" name="thu" {{(!$doctor->WeekDoctor->thu == null)? 'checked' : ''}} disabled>
                        <label class="form-check-label" for="thu">Thu</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="fri" name="fri" {{(!$doctor->WeekDoctor->fri == null)? 'checked' : ''}} disabled>
                        <label class="form-check-label" for="fri">Fri</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sat" name="sat" {{(!$doctor->WeekDoctor->sat == null)? 'checked' : ''}} disabled>
                        <label class="form-check-label" for="sat">Sat</label>
                    </div>
                    <p>Available Time</p>
                    <button type="button" class="btn btn-primary btn-sm" disabled>{{$doctor->from_time.' To '.$doctor->from_to}}</button>
                </div>
            </div>
        </div>
        <div class="col-md-7">
        </div>
    </div>
</div>

@endsection
