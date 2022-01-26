@extends('Admin.Dashboard.index')
@section("content")
<div class="container">
    <div class="d-flex justify-content-between mt-4">
        <b>RECEPTIONIST LIST</b>
        <nav aria-label="breadcrumb" id="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('Admin.receptionist.index')}}">Receptionist</a></li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <a href="{{route('Admin.receptionist.create')}}" class="btn btn-primary mb-4 btn-sm"><i class="fas fa-plus"></i> New Receptionist</a>
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
                @foreach($receptionists as $receptionist)
                    <tr>
                        <td>{{$receptionist->id}}</td>
                        <td>{{$receptionist->first_name.' '. $receptionist->last_name}}</td>
                        <td>{{$receptionist->number}}</td>
                        <td>{{$receptionist->email}}</td>
                        <td>
                            <form action="{{route('Admin.receptionist.destroy',[$receptionist->id])}}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <input type="hidden" value="{{$receptionist->id}}">
                                <a href="{{route('Admin.receptionist.show',[$receptionist->id])}}" class="btn btn-primary btn-sm rounded-circle"><i class="far fa-eye"></i></a>
                                <a href="{{route('Admin.receptionist.edit',[$receptionist->id])}}" class="btn btn-primary btn-sm rounded-circle"><i class="fas fa-pen"></i></a>
                                <button  class="btn btn-sm rounded-circle btn-primary" type="submit"><i class="fas fa-trash-alt"></i></button>

                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$receptionists->links()}}
        </div>
    </div>
</div>
@endsection
