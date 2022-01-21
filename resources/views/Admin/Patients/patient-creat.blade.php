@extends('Admin.Dashboard.index')
@section("content")
<div class="container">
    <div class="d-flex justify-content-between mt-4">
        <b>ADD NEW PATIENT</b>
        <nav aria-label="breadcrumb" id="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('Admin.patient.index')}}">Patients</a></li>
                <li class="breadcrumb-item"><a href="{{route('Admin.patient.create')}}">Add New Patient</a></li>
            </ol>
        </nav>
    </div>
    <a href="{{route('Admin.patient.index')}}" class="btn btn-primary mb-4 btn-sm"><i class="fas fa-long-arrow-alt-left"></i> Back to Patient List</a>
    <form action="{{route('Admin.patient.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <b class="border-bottom">Basic Information</b>
                    <div class="col-6 mt-3">
                        <label for="first_name">First Name *</label>
                        <input type="text" id="first_name" class="form-control" name="first_name" placeholder="Enter First Name" >
                    </div>
                    <div class="col-6 mt-3">
                        <label for="last_name">Last Name *</label>
                        <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Enter Last Name">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="gender">Gender *</label>
                        <select name="gender" id="gender" class="form-select">
                            <option selected>-- Select Gender --</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="col-6 mt-3">
                        <label for="age">Age *</label>
                        <input type="text" id="age" class="form-control" name="age" placeholder="Enter Age">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="email">E-mail*</label>
                        <input type="text" id="email" class="form-control" name="email" placeholder="Enter E-Mail">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="number">Contact Number *</label>
                        <input type="text" id="number" class="form-control" name="number" placeholder="Enter Contact Number">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="address">Current Address *</label>
                        <textarea class="form-control" placeholder="Enter Current Addres" id="address" name="address"></textarea>
                    </div>
                    <div class="col-6 mt-4">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="img_avatar">Upload</label>
                            <input type="file" class="form-control" id="img_avatar" name="img_avatar" value="null">
                        </div>
                    </div>
                    <b class="border-bottom mt-4">Medical Information</b>
                    <div class="col-6 mt-3">
                        <label for="height">Height *</label>
                        <input type="text" id="height" class="form-control" name="height" placeholder="Enter Height" >
                    </div>
                    <div class="col-6 mt-3">
                        <label for="weight">weight *</label>
                        <input type="text" id="weight" class="form-control" name="weight" placeholder="Enter Weight" >
                    </div>
                    <div class="col-6 mt-3">
                        <label for="blood">Blood Group *</label>
                        <select name="blood" id="blood" class="form-select">
                            <option selected>-- Select Blood Group --</option>
                            <option value="a+">A+</option>
                            <option value="a-">A-</option>
                            <option value="b+">B+</option>
                            <option value="b-">B-</option>
                            <option value="o+">O+</option>
                            <option value="o-">O-</option>
                            <option value="ab+">AB+</option>
                            <option value="ab-">AB-</option>
                        </select>
                    </div>
                    <div class="col-6 mt-3">
                        <label for="blood_pressure">Blood Pressure *</label>
                        <input type="text" id="blood_pressure" class="form-control" name="blood_pressure" placeholder="Enter Blood Pressure" >
                    </div>
                    <div class="col-6 mt-3">
                        <label for="pulse">Pulse *</label>
                        <input type="text" id="pulse" class="form-control" name="pulse" placeholder="Enter Pulse" >
                    </div>
                    <div class="col-6 mt-3">
                        <label for="respiration">Respiration *</label>
                        <input type="text" id="respiration" class="form-control" name="respiration" placeholder="Enter Respiration" >
                    </div>
                    <div class="col-6 mt-3">
                        <label for="allergy">Allergy *</label>
                        <input type="text" id="allergy" class="form-control" name="allergy" placeholder="Enter Allergy" >
                    </div>
                    <div class="col-6 mt-3">
                        <label for="diet">Diet *</label>
                        <select name="diet" id="diet" class="form-select">
                            <option selected>-- Select Diet --</option>
                            <option value="vegetarian">Vegetarian</option>
                            <option value="non-vegetarian">Non-Vegetarian</option>
                            <option value="vegan">Vegan</option>
                        </select>
                    </div>

                </div>
                <button class="btn btn-primary mt-4 btn-sm">Add New Doctor</button>
            </div>
        </div>

    </form>
</div>
@endsection
