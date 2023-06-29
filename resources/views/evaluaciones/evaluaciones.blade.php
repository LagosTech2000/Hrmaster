@extends('layouts.app')
@section('title')
Evaluaciones
@endsection
@section('content')
<section>
    <div class="section-header" style="max-height: 3rem;">
    </div>
    <h5 style="background-color:white; padding:0.4rem; border-radius:1rem;" id="paseSalidaMensaje">Empleados a Evaluar:</h5>
    <br>
    @if(Session::has('notiGuardado') )
                 <div  style="max-height: 4.5rem; max-width: 45rem;" class="alert alert-success alert-dismissible fade show" role="alert">
                   <h5 class="alert-heading">!Guardado!</h5>
                     <strong>{{Session('notiGuardado')}}  </strong>
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
   @endif


    <table id="permisoPersonal" class="table table-striped table-bordered table-sm text-center" style="width:100%">
        <thead style="background-color:#236355;">
            <tr>
                <th style="color: #fff;">Nombre</th>
                <th style="color: #fff;">Area de trabajo:</th>
                <th style="color: #fff;">Accion</th>
            </tr>
        </thead>
        <tbody>

            @if(isset($data))

            @foreach($data as $d)
            <tr>

                <td>{{$d['nombreEmpleado']}}</td>
                <td>{{ $d['areaTrabajo'] }}</td>

                @if($d['idUser'] !=0)
                <td>
                <form action="{{route('evaluar')}}" method="post">
                @csrf
                        <input type="hidden" name="id" value="{{$d['id']}}">
                        <input class="btn btn-primary" type="submit" value="Evaluar">

                </form>
                
            </td>
            @endif
            </tr>

            @endforeach
            @endif

        </tbody>
    </table>
    {{-- final --}}
    </div>
    </div>
    </div>
    </div>
    </div>
</section>

@endsection