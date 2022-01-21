
<!--NavBar Top -->
<nav>
    <ul class="nav d-flex bd-highlight" id="nav-top">
        <li class="nav-item flex-grow-1 bd-highlight ms-4">
            <a href="" class="nav-link">DOCTORLY</a>
        </li>
        <li class="nav-item bd-highlight">
            <a href="" class="nav-link"><i class="fas fa-expand"></i></a>
        </li>
        <li class="nav-item bd-highlight">
            <a href="" class="nav-link"><i class="far fa-bell"></i></a>
        </li>
        <li class="nav-item bd-highlight">
            <a href="" class="nav-link">
                <i class="fas fa-user"></i>
            </a>
        </li>
        <li class="nav-item bd-highlight">
            <a href="" class="nav-link justify-content-end me-4"><i class="fas fa-cog"></i></a>
        </li>
    </ul>
</nav>
<!--FIM NavBar Top -->
<!-- Sub NavBar Top -->
<nav id="nav-sub">
    <ul class="nav">
        <li class="nav-item ms-4">
            <a href="/" class="nav-link"><i class="fas fa-house-user"></i>Dashboard</a>
        </li>
        <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                <i class="fas fa-user"></i>
                Doctors
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{route('Admin.doctor.index')}}" class="dropdown-item">List of Doctors</a></li>
                <li><a href="{{route('Admin.doctor.create')}}" class="dropdown-item">Add New doctors</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                <i class="fas fa-user"></i>
                Patients
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{route('Admin.patient.index')}}" class="dropdown-item">List of Patients</a></li>
                <li><a href="{{route('Admin.patient.create')}}" class="dropdown-item">Add New Patients</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                <i class="fas fa-user"></i>
                Receptionist
            </a>
            <ul class="dropdown-menu">
                <li><a href="" class="dropdown-item">List of Receptionist</a></li>
                <li><a href="" class="dropdown-item">Add New Receptionist</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fas fa-plus"></i>
                Appointment List
            </a>
        </li>
    </ul>
</nav>
<!-- Fim Sub NavBar Top -->
