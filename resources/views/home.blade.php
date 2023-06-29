@extends('layouts.app')
@section('title')
    Inicio
@endsection
@section('content')
  <section class="section">
    <div class="section-header"  style="max-height: 3rem;">
      <h5 class="page__heading">Inicio</h5>
    </div>
{{-------------------------- NOTIFICACIONES INICIO--------------------------------------}}

     {{-- INICIO recursso humanos notificacion --}}
     @can('admin-ver')
       <div style="display: none" name="notificaciones" id="notificaciones">
         <input  name="NotificacionRecursosH" type="hidden" value="{{ $paseSalida }}">
           <a id="NotificacionRecursosH" style="font-size: 14px;"  href="{{ url('/recursos-humanos-permisos/pase-salida-admin') }}" style="margin-top: 0.5rem" type="button" class="btn btn-primary">
           Recursos Humanos:<span style="font-size: 14px" class="badge badge-light">{{ $paseSalida }}</span>
           </a>
       </div>
     @endcan 
     {{-- FINAL recursso humanos notificacion --}}

 {{-------------------------- NOTIFICACIONES FINAL----------------------------------------}}

        <div class="section-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

    {{-------------------------- INICIO --------------------------}}

          <a href="{{route('misevaluaciones')}}" class="btn-lg btn-primary rounded">Mis Evaluaciones</a>                
    
    {{-------------------------- FINAL ---------------------------}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @section('scripts')
    <script>
      // INICIO mostrar la notificacion de recursos humanos
      var  notificacionRecursosHumanos = document.getElementsByName("NotificacionRecursosH")[0].value;;
      console.log(notificacionRecursosHumanos);
     $(function(){
       if(notificacionRecursosHumanos > 0){
        $('#notificaciones').show();
       }
     });
     // FINAL mostrar la notificacion de recursos humanos 

    // INICIO recargar automaticamente el inico
     $(document).ready(function(){
       setTimeout(refrescar, 20000);
      });
  function refrescar(){
      location.reload();
     }
    // FINAL recargar automaticamente el inico
    </script>
    @endsection

@endsection


