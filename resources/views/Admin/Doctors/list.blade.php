@extends('Admin.Dashboard.index')
@section("content")
<div class="container">
    <div class="d-flex justify-content-between mt-4">
        <b>DOCTOR LIST</b>
        <nav aria-label="breadcrumb" id="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('Admin.doctor.index')}}">Doctors</a></li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <a href="{{route('Admin.doctor.create')}}" class="btn btn-primary mb-4 btn-sm"><i class="fas fa-plus"></i> New Doctor</a>
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Sr.no</th>
                    <th>Title</th>
                    <th>Name</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($doctors as $doctor)
                    <tr>
                        <td>{{$doctor->id}}</td>
                        <td>{{$doctor->title}}</td>
                        <td>{{$doctor->first_name.' '. $doctor->last_name}}</td>
                        <td>{{$doctor->number}}</td>
                        <td>{{$doctor->email}}</td>
                        <td>
                            <form action="{{route('Admin.doctor.destroy',[$doctor->id])}}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <input type="hidden" value="{{$doctor->id}}">
                                <a href="{{route('Admin.doctor.show',[$doctor->id])}}" class="btn btn-primary btn-sm rounded-circle"><i class="far fa-eye"></i></a>
                                <a href="{{route('Admin.doctor.update',[$doctor->id])}}" class="btn btn-primary btn-sm rounded-circle"><i class="fas fa-pen"></i></a>
                                <button  class="btn btn-sm rounded-circle btn-primary" type="submit"><i class="fas fa-trash-alt"></i></button>

                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$doctors->links()}}
        </div>
    </div>
</div>
@endsection
