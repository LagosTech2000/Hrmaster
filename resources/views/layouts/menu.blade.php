<li class=" side-menus {{ Request::is('*') ? 'active' : 'inactive' }}">

    <a class="nav-link" href="{{ route('home')}}">
        <i class=" fas fa-building"></i><span>Inicio</span>
    </a>

    @if(\Illuminate\Support\Facades\Auth::user())

    @foreach(\Illuminate\Support\Facades\Auth::user()->getRoleNames() as $rolName)
    @if($rolName == "admin")
    
    <a class="nav-link" href="{{ route('usuarios.index')}}">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>



    <a class="nav-link" href="{{ route('roles.index')}}">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>



    <a class="nav-link" href="{{ route('empleados.index')}}">
        <i class=" fas fa-address-card"></i><span>Empleados</span>
    </a>



    <a class="nav-link" href="{{ route('evaluaciones')}}">
        <i class=" fas fa-phone-square"></i><span>Evaluaciones</span>
    </a>

    
    <a class="nav-link" href="{{ route('evaluados')}}">
        <i class=" fas fa-search"></i><span>Búsqueda</span>
    </a>




    @endif
    @endforeach

    <a class="nav-link" href="{{ route('dashboard')}}">
        <i class=" fas fa-chart-bar"></i><span>DashBoard</span>
    </a>

    @endif


   



</li>