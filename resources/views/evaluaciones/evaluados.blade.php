@extends('layouts.app')
@section('title')
Búsqueda
@endsection
@section('content')
<section>
    <div class="section-header" style="max-height: 3rem;">
    </div>
    <h5 style="background-color:white; padding:0.4rem; border-radius:1rem;" id="paseSalidaMensaje">Búsqueda De Empleados:</h5>
    <br>
    @if(Session::has('notiGuardado') )
    <div style="max-height: 4.5rem; max-width: 45rem;" class="alert alert-success alert-dismissible fade show" role="alert">
        <h5 class="alert-heading">Error</h5>
        <strong>{{Session('notiGuardado')}} </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row">

        <form action="{{ route('evaluados') }}" method="post">
            @csrf

            <div class="form-group text-center">
                <label class="text-center" style="font-size:16px; font-weight:bold; color:rgb(92, 92, 92);" for="areaTrabajo">Área de trabajo:</label>
                <select required class="text-center form-control " style="font-weight:bold;" id="areaTrabajo" name="areaTrabajo">
                    <option disabled selected value="">Seleccione el Área</option>
                    <option value="Recursos Humanos">Recursos Humanos</option>
                    <option value="Administración">Administración</option>
                    <option value="Atención al Cliente">Atencion al cliente</option>
                    <option value="Seguridad">Seguridad</option>
                    <option value="Planta Externa">Planta Externa</option>
                    <option value="Soporte">Soporte</option>

                </select>
            </div>

            <center>

                <input class="btn btn-primary" type="submit" name="enviar" value="Buscar">
            </center>
            <br>

        </form>
    </div>

    <table id="permisoPersonal" class="table table-striped table-bordered table-sm text-center" style="width:100%">
        <thead style="background-color:#236355;">
            <tr>
                <th style="color: #fff;">Nombre</th>
                <th style="color: #fff;">Realizada en:</th>
                <th style="color: #fff;">Area</th>
                <th style="color: #fff;">Valoracion</th>
                <th style="color: #fff;">Accion</th>
            </tr>
        </thead>
        <tbody>

            @if(isset($data))

            @foreach($data as $d)
            <tr>

                <td>{{$d['nombreEmpleado']}}</td>
                <td>{{ $d['eval_created_at'] }}</td>
                <td>{{ $d['areaTrabajo'] }}</td>
                <td>{{ $d['valoracion'] }}</td>

                
                <td>
                    <form action="{{route('pdf2')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$d['idUser']}}">
                        <input class="btn btn-secondary" type="submit" value="Pdf">

                    </form>

                </td>
                
            </tr>

            @endforeach
            @endif

        </tbody>




    </table>
    
     
            
      
        
        
            <canvas id="chart"></canvas>
        
        
     

</div>
    </div>
    </div>
   
    </div>
    </div>
    </div>
</section>
@section('scripts')

      @if(isset($data2))

<script>
 var ctx = document.getElementById('chart').getContext('2d');
var chart = new Chart(ctx, {
  type: 'bar', 
  data: {
    labels: {!! json_encode($data2->keys()) !!},
    datasets: [{
      label: 'Promedio de valoracion por evaluacion',
      data: {!! json_encode($data2->values()) !!},
      backgroundColor: [
        'rgba(255, 69, 0, 0.5)',
'rgba(255, 0, 255, 0.5)', 
'rgba(0, 191, 255, 0.5)', 
'rgba(255, 0, 0, 0.5)', 
'rgba(0, 255, 0, 0.5)', 
'rgba(255, 165, 0, 0.5)', 
'rgba(30, 144, 255, 0.5)' 
      ],
      borderColor: [
        'rgba(255, 69, 0, 0.5)',
'rgba(255, 0, 255, 0.5)', 
'rgba(0, 191, 255, 0.5)', 
'rgba(255, 0, 0, 0.5)', 
'rgba(0, 255, 0, 0.5)', 
'rgba(255, 165, 0, 0.5)', 
'rgba(30, 144, 255, 0.5)' 
      ],
      borderWidth: 2
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});

      </script>   
@endif
@endsection

@endsection