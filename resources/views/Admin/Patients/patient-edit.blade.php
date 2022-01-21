@extends('Admin.Dashboard.index')
@section("content")
<div class="container">
    <div class="d-flex justify-content-between mt-4">
        <b>UPDATE PATIENT DETAILS</b>
        <nav aria-label="breadcrumb" id="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('Admin.patient.index')}}">Patients</a></li>
                <li class="breadcrumb-item"><a href="#">Update Patient Details</a></li>
            </ol>
        </nav>
    </div>
    <a href="{{route('Admin.patient.show',$patient->id)}}" class="btn btn-primary mb-4 btn-sm"><i class="fas fa-long-arrow-alt-left"></i> Back to Patient List</a>
    <form action="{{route('Admin.patient.update',$patient->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <b class="border-bottom">Basic Information</b>
                    <div class="col-6 mt-3">
                        <label for="first_name">First Name *</label>
                        <input type="text" id="first_name" class="form-control" name="first_name" value="{{$patient->first_name}}" >
                    </div>
                    <div class="col-6 mt-3">
                        <label for="last_name">Last Name *</label>
                        <input type="text" id="last_name" class="form-control" name="last_name" value="{{$patient->last_name}}">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="gender">Gender *</label>
                        <select name="gender" id="gender" class="form-select">
                            <option selected>-- Select Gender --</option>
                            <option value="male" {{$patient->gender == 'male'? 'selected' : ''}}>Male</option>
                            <option value="female" {{$patient->gender == 'female'? 'selected' : ''}}>Female</option>
                            <option value="other" {{$patient->gender == 'other'? 'selected' : ''}}>Other</option>
                        </select>
                    </div>
                    <div class="col-6 mt-3">
                        <label for="age">Age *</label>
                        <input type="text" id="age" class="form-control" name="age" value="{{$patient->Age}}">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="email">E-mail*</label>
                        <input type="text" id="email" class="form-control" name="email" value="{{$patient->email}}">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="number">Contact Number *</label>
                        <input type="text" id="number" class="form-control" name="number" value="{{$patient->number}}">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="address">Current Address *</label>
                        <textarea class="form-control" id="address" name="address" >{{$patient->address}}</textarea>
                    </div>
                    <div class="col-6 mt-4">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="img_avatar">Upload</label>
                            <input type="file" class="form-control" id="img_avatar" name="img_avatar" value="{{$patient->PatientAvatar->img_avatar}}" >
                        </div>
                    </div>
                    <b class="border-bottom mt-4">Medical Information</b>
                    <div class="col-6 mt-3">
                        <label for="height">Height *</label>
                        <input type="text" id="height" class="form-control" name="height" value="{{$patient->PatientMedical->height}}" >
                    </div>
                    <div class="col-6 mt-3">
                        <label for="weight">weight *</label>
                        <input type="text" id="weight" class="form-control" name="weight" value="{{$patient->PatientMedical->weight}}" >
                    </div>
                    <div class="col-6 mt-3">
                        <label for="blood">Blood Group *</label>
                        <select name="blood" id="blood" class="form-select">
                            <option selected>-- Select Blood Group --</option>
                            <option value="a+" {{$patient->PatientMedical->blood == 'a+'? 'selected' : ''}}>A+</option>
                            <option value="a-" {{$patient->PatientMedical->blood == 'a-'? 'selected' : ''}}>A-</option>
                            <option value="b+" {{$patient->PatientMedical->blood == 'b+'? 'selected' : ''}}>B+</option>
                            <option value="b-" {{$patient->PatientMedical->blood == 'b-'? 'selected' : ''}}>B-</option>
                            <option value="o+" {{$patient->PatientMedical->blood == 'o+'? 'selected' : ''}}>O+</option>
                            <option value="o-" {{$patient->PatientMedical->blood == 'o-'? 'selected' : ''}}>O-</option>
                            <option value="ab+" {{$patient->PatientMedical->blood == 'ab+'? 'selected' : ''}}>AB+</option>
                            <option value="ab-" {{$patient->PatientMedical->blood == 'ab-'? 'selected' : ''}}>AB-</option>
                        </select>
                    </div>
                    <div class="col-6 mt-3">
                        <label for="blood_pressure">Blood Pressure *</label>
                        <input type="text" id="blood_pressure" class="form-control" name="blood_pressure" value="{{$patient->PatientMedical->blood_pressure}}" >
                    </div>
                    <div class="col-6 mt-3">
                        <label for="pulse">Pulse *</label>
                        <input type="text" id="pulse" class="form-control" name="pulse" value="{{$patient->PatientMedical->pulse}}" >
                    </div>
                    <div class="col-6 mt-3">
                        <label for="respiration">Respiration *</label>
                        <input type="text" id="respiration" class="form-control" name="respiration" value="{{$patient->PatientMedical->respiration}}" >
                    </div>
                    <div class="col-6 mt-3">
                        <label for="allergy">Allergy *</label>
                        <input type="text" id="allergy" class="form-control" name="allergy" value="{{$patient->PatientMedical->allergy}}" >
                    </div>
                    <div class="col-6 mt-3">
                        <label for="diet">Diet *</label>
                        <select name="diet" id="diet" class="form-select">
                            <option selected>-- Select Diet --</option>
                            <option value="vegetarian" {{$patient->PatientMedical->diet == 'vegetarian'? 'selected' : ''}}>Vegetarian</option>
                            <option value="non-vegetarian" {{$patient->PatientMedical->diet == 'non-vegetarian'? 'selected' : ''}}>Non-Vegetarian</option>
                            <option value="vegan" {{$patient->PatientMedical->diet == 'vegan'? 'selected' : ''}}>Vegan</option>
                        </select>
                    </div>

                </div>
                <button class="btn btn-primary mt-4 btn-sm">Update Patient Details</button>
            </div>
        </div>

    </form>
</div>
@endsection
