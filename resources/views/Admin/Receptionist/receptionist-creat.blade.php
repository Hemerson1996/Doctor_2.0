@extends('Admin.Dashboard.index')
@section("content")
<div class="container">
    <div class="d-flex justify-content-between mt-4">
        <b>ADD NEW RECEPTIONIST</b>
        <nav aria-label="breadcrumb" id="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('Admin.receptionist.index')}}">Receptionist</a></li>
                <li class="breadcrumb-item"><a href="{{route('Admin.receptionist.create')}}">Add New Receptionist</a></li>
            </ol>
        </nav>
    </div>
    <a href="{{route('Admin.receptionist.index')}}" class="btn btn-primary mb-4 btn-sm"><i class="fas fa-long-arrow-alt-left"></i> Back to Receptionist List</a>
    <form action="{{route('Admin.receptionist.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
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
                        <label for="email">E-Mail *</label>
                        <input type="text" id="email" class="form-control" name="email" placeholder="Enter E-Mail">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="number">Contact Number *</label>
                        <input type="text" id="number" class="form-control" name="number" placeholder="Enter Contact Number">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="doctor">Doctor</label>
                        <select name="doctor" id="doctor" class="form-select">
                            <option selected>-- Select Gender --</option>
                            @foreach($doctors as $doctor)
                                <option value="{{$doctor->id}}">{{$doctor->first_name." ".$doctor->last_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 mt-4">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="img_avatar">Upload</label>
                            <input type="file" class="form-control" id="img_avatar" name="img_avatar" value="null">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary mt-4 btn-sm">Add New Receptionist</button>
            </div>
        </div>
    </form>
</div>
@endsection
