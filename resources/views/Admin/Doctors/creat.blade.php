@extends('Admin.Dashboard.index')
@section("content")
<div class="container">
    <div class="d-flex justify-content-between mt-4">
        <b>ADD NEW DOCTOR</b>
        <nav aria-label="breadcrumb" id="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('Admin.doctor.index')}}">Doctors</a></li>
                <li class="breadcrumb-item"><a href="{{route('Admin.doctor.create')}}">Add New Doctor</a></li>
            </ol>
        </nav>
    </div>
    <a href="{{route('Admin.doctor.index')}}" class="btn btn-primary mb-4 btn-sm"><i class="fas fa-long-arrow-alt-left"></i> Back to Doctor List</a>
    <form action="{{route('Admin.doctor.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <div class="card">
            <div class="card-body">
                <b class="border-bottom">Basic Information</b>
                <div class="row">
                    <div class="col-6 mt-3">
                        <label for="first_name">First Name *</label>
                        <input type="text" id="first_name" class="form-control" name="first_name" placeholder="Enter First Name" >
                    </div>
                    <div class="col-6 mt-3">
                        <label for="last_name">Last Name *</label>
                        <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Enter Last Name">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="email">E-Mail *</label>
                        <input type="text" id="email" class="form-control" name="email" placeholder="Enter E-Mail">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="number">Contact Number*</label>
                        <input type="text" id="number" class="form-control" name="number" placeholder="Enter Contact Number">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="title">Tilte*</label>
                        <input type="text" id="title" class="form-control" name="title" placeholder="Enter Title">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="degree">Degree *</label>
                        <input type="text" id="degree" class="form-control" name="degree" placeholder="Enter Degree">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="experience">Experience *</label>
                        <input type="text" id="experience" class="form-control" name="experience" placeholder="Enter Experience">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="fess">Fees *</label>
                        <input type="text" id="fess" class="form-control" name="fess" placeholder="Enter Fess">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="">Doctor available days*</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="sun" name="sun">
                            <label class="form-check-label" for="sun">Sub</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="mon" name="mon">
                            <label class="form-check-label" for="mon">Mon</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="tue" name="tue">
                            <label class="form-check-label" for="tue">Tue</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="wen" name="wen">
                            <label class="form-check-label" for="wen">Wen</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="thu" name="thu">
                            <label class="form-check-label" for="thu">Thu</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="fri" name="fri">
                            <label class="form-check-label" for="fri">Fri</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="sat" name="sat">
                            <label class="form-check-label" for="sat">Sat</label>
                        </div>
                    </div>
                    <div class="col-6 mt-4">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="img_avatar">Upload</label>
                            <input type="file" class="form-control" id="img_avatar" name="img_avatar" value="null">
                        </div>
                    </div>
                    <div class="col-2 mt-4">
                        <label for="time_slots">Slots Time(In Minute)* </label>
                        <input type="number" id="time_slots" class="form-control" name="time_slots">
                    </div>
                    <div class="col-6 ">
                        <label>Available Time * </label><br>
                        <div class="row">
                            <div class="col-3">
                                <label for="from_time">From</label>
                                <input type="time" id="from_time" class="form-control" name="from_time">
                            </div>
                            <div class="col-3">
                                <label for="from_to">To</label>
                                <input type="time" id="from_to" class="form-control" name="from_to">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary mt-4 btn-sm">Add New Doctor</button>
            </div>
        </div>

    </form>
</div>
@endsection
