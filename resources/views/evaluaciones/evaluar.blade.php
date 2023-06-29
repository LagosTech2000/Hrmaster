@extends('layouts.app')
@section('title')
Evaluar
@endsection
@section('content')
<section>
  <div class="section-header">
    <h2>Evaluar</h2>
  </div>
  <br>
  <div class="section-body">
    
 

    <center>

      <div style="margin-left:10%;" class="w-100">
        <div class="row">

          <h5 class="col-3">Nombre: {{$data['nombreEmpleado']}}</h5>
          <h5 class="col-3">Identidad: {{$data['numIdentidadEmpleado']}}</h5>
          <h5 class="col-4">Departamento: {{$data['areaTrabajo']}}</h5>

        </div>
        <br>
        <div class="row">
          <h5 class="col-5">Revisor: {{\Illuminate\Support\Facades\Auth::user()->name}}</h5>

          <h5 class="col-5">Titulo del Revisor: Administrador</h5>

        </div>

        <br>
        <div class="row">
          
          <h5 class="col-5">Fecha De Hoy: {{now();}}</h5>

        </div>


      </div>

      <br>
      <form action="{{route('evaluar')}}" method="post">
        @csrf
        <table class="table table-striped table-bordered table-sm text-center" style="width:100%">
          <thead>
            <tr>
              <th class="bg-primary text-white">Calidad</th>
              <th class="bg-primary text-white">Evaluacion</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Trabaja a todo su potencial</td>
              <td> 1 <input style="accent-color:#cab15e; " value="1" min="1" max="4" step="1" type="range" name="trabaja_a_todo_potencial" id=""> 4</td>
            </tr>

            <tr>
              <td>Calidad de Trabajo</td>
              <td> 1 <input style="accent-color:#cab15e; " value="1" min="1" max="4" step="1" type="range" name="calidad_trabajo" id=""> 4</td>
            </tr>

            <tr>
              <td>Consistencia en el trabajo</td>
              <td> 1 <input style="accent-color:#cab15e; " value="1" min="1" max="4" step="1" type="range" name="consistencia_trabajo" id=""> 4</td>
            </tr>

            <tr>
              <td>Comunicacion</td>
              <td> 1 <input style="accent-color:#cab15e; " value="1" min="1" max="4" step="1" type="range" name="comunicacion" id=""> 4</td>
            </tr>

            <tr>
              <td>Trabajo independiente</td>
              <td> 1 <input style="accent-color:#cab15e; " value="1" min="1" max="4" step="1" type="range" name="trabajo_independiente" id=""> 4</td>
            </tr>

            <tr>
              <td>toma la iniciativa</td>
              <td> 1 <input style="accent-color:#cab15e; " value="1" min="1" max="4" step="1" type="range" name="toma_iniciativa" id=""> 4</td>
            </tr>

            <tr>
              <td>trabajo en grupo</td>
              <td> 1 <input style="accent-color:#cab15e; " value="1" min="1" max="4" step="1" type="range" name="trabajo_grupo" id=""> 4</td>
            </tr>

            <tr>
              <td>productividad</td>
              <td> 1 <input style="accent-color:#cab15e; " value="1" min="1" max="4" step="1" type="range" name="productividad" id=""> 4</td>
            </tr>

            <tr>
              <td>creatividad</td>
              <td> 1 <input style="accent-color:#cab15e; " value="1" min="1" max="4" step="1" type="range" name="creatividad" id=""> 4</td>
            </tr>

            <tr>
              <td>honestidad</td>
              <td> 1 <input style="accent-color:#cab15e; " value="1" min="1" max="4" step="1" type="range" name="honestidad" id=""> 4</td>
            </tr>

            <tr>
              <td>integridad</td>
              <td> 1 <input style="accent-color:#cab15e; " value="1" min="1" max="4" step="1" type="range" name="integridad" id=""> 4</td>
            </tr>

            <tr>
              <td>relaciones con compañeros del trabajo</td>
              <td> 1 <input style="accent-color:#cab15e; " value="1" min="1" max="4" step="1" type="range" name="relaciones_compañeros_trabajo" id=""> 4</td>
            </tr>

            <tr>
              <td>relaciones con los clientes</td>
              <td> 1 <input style="accent-color:#cab15e; " value="1" min="1" max="4" step="1" type="range" name="relaciones_clientes" id=""> 4</td>
            </tr>

            <tr>
              <td>habilidades tecnicas</td>
              <td> 1 <input style="accent-color:#cab15e; " value="1" min="1" max="4" step="1" type="range" name="habilidades_tecnicas" id=""> 4</td>
            </tr>

            <tr>
              <td>fiabilidad</td>
              <td> 1 <input style="accent-color:#cab15e; " value="1" min="1" max="4" step="1" type="range" name="fiabilidad" id=""> 4</td>
            </tr>

            <tr>
              <td>puntualidad</td>
              <td> 1 <input style="accent-color:#cab15e; " value="1" min="1" max="4" step="1" type="range" name="puntualidad" id=""> 4</td>
            </tr>

            <tr>
              <td>asistencia</td>
              <td> 1 <input style="accent-color:#cab15e; " value="1" min="1" max="4" step="1" type="range" name="asistencia" id=""> 4</td>
            </tr>


          </tbody>

        </table>

        <div>
          <label for="objetivos_alcanzados">Objetivos Alcanzados</label><br>
          <textarea style="height:3cm;" class="text-center w-75 rounded" type="text" name="objetivos_alcanzados" id="objetivos_alcanzados"></textarea>
        </div>

        <div>
          <label for="objetivos_proxima_evaluacion">Objetivos para la Proxima Evaluacion</label><br>
          <textarea style="height:3cm;" class="text-center w-75 rounded" type="text" name="objetivos_proxima_evaluacion" id="objetivos_proxima_evaluacion"></textarea>
        </div>

        <div>
          <label for="comentarios">Comentarios</label><br>
          <textarea style="height:3cm;" class="text-center w-75 rounded" type="text" name="comentarios" id="comentarios"></textarea>
        </div>

        <br>
         <input type="hidden" name="revisor" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" >
        <input class="btn btn-primary" type="submit" name="guardar" value="Guardar">
      </form>


    </center>

  </div>

</section>

@endsection