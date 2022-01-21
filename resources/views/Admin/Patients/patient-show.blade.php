@extends('Admin.Dashboard.index')
@section("content")

<div class="container">
    <div class="row">
        <div class="d-flex justify-content-between mt-4">
            <b>PATIENT PROFILE</b>
            <nav aria-label="breadcrumb" id="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('Admin.patient.index')}}">Patients</a></li>
                    <li class="breadcrumb-item">Patient Profile</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-4 me-4">
            <div class="card">
                <img src="https://www.igemc.com.br/wp-content/uploads/2018/04/fundoespecialidades-1.jpg?id=30" class="card-img-top" height="150" style="background:#d4dbf9">
                <div class="card-body">
                    <img src="{{($patient->PatientAvatar->img_avatar == null)? asset('/img-avatar-padrao/foto-perfil-masc.png'): Storage::url($patient->PatientAvatar->img_avatar)}}" class="rounded-circle" width="75" height="75" alt="Responsive image">
                    <div class="card-title">{{$patient->first_name." ".$patient->last_name}}</div>
                    <div class="card-text">
                        <small class="text-muted">{{$patient->title}}.</small>
                    </div>
                    <div class="card-text">
                        <a href="{{route('Admin.patient.edit',[$patient->id])}}" class="btn btn-primary btn-sm">Edit Profile <i class="fas fa-long-arrow-alt-right"></i></a>
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
                            <td>{{$patient->first_name." ".$patient->last_name}}</td>
                        </tr>
                        <tr>
                            <th>Contact No:</th>
                            <td>{{$patient->number}}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{$patient->email}}</td>
                        </tr>
                        <tr>
                            <th>Age:</th>
                            <td>{{$patient->Age}}</td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>{{$patient->gender}} Year</td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td>{{$patient->address}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-7">
        </div>
    </div>
</div>

@endsection
