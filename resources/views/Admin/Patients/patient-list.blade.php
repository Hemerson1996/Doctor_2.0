@extends('Admin.Dashboard.index')
@section("content")
<div class="container">
    <div class="d-flex justify-content-between mt-4">
        <b>PATIENTS LIST</b>
        <nav aria-label="breadcrumb" id="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('Admin.patient.index')}}">Patients</a></li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <a href="{{route('Admin.patient.create')}}" class="btn btn-primary mb-4 btn-sm"><i class="fas fa-plus"></i> New Patient</a>
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Sr.no</th>
                    <th>Name</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($patients as $patient)
                    <tr>
                        <td>{{$patient->id}}</td>
                        <td>{{$patient->first_name.' '. $patient->last_name}}</td>
                        <td>{{$patient->number}}</td>
                        <td>{{$patient->email}}</td>
                        <td>
                            <form action="{{route('Admin.patient.destroy',[$patient->id])}}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <input type="hidden" value="{{$patient->id}}">
                                <a href="{{route('Admin.patient.show',[$patient->id])}}" class="btn btn-primary btn-sm rounded-circle"><i class="far fa-eye"></i></a>
                                <a href="{{route('Admin.patient.update',[$patient->id])}}" class="btn btn-primary btn-sm rounded-circle"><i class="fas fa-pen"></i></a>
                                <button  class="btn btn-sm rounded-circle btn-primary" type="submit"><i class="fas fa-trash-alt"></i></button>

                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$patients->links()}}
        </div>
    </div>
</div>
@endsection
