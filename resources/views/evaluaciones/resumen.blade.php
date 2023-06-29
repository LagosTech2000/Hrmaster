<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen Evaluacion</title>
</head>
<style>
    table{
        border:1px solid black;
        border-collapse: collapse;
    }

    td{
        border:1px solid black;
        height:25px;
        text-align: center;

    }
</style>
<body>
   
<section>
  <div class="section-body">
    
 

    <center>


          

          <table style="width:100%">
            <thead></thead>
            <tbody>
                <tr>
                    <td>Nombre: </td>
                    <td>{{$data->nombreEmpleado}}</td>
                </tr>

                <tr>
                    <td>Identidad: </td>
                    <td>{{$data->numIdentidadEmpleado }}</td>
                </tr>

                <tr>
                    <td>Departamento: </td>
                    <td>{{$data->areaTrabajo}}</td>
                </tr>

                <tr>
                    <td>Nombre del Revisor: </td>
                    <td>{{$data->revisor}}</td>
                </tr>

                <tr>
                    <td>Titulo del Revisor: </td>
                    <td>Administrador</td>
                </tr>
            </tbody>
          </table>

<br>
     
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
              <td>{{$data->trabaja_a_todo_potencial}}</td>
            </tr>

            <tr>
              <td>Calidad de Trabajo</td>
              <td> {{$data->calidad_trabajo}}</td>
            </tr>

            <tr>
              <td>Consistencia en el trabajo</td>
              <td> {{$data->consistencia_trabajo}}</td>
            </tr>

            <tr>
              <td>Comunicacion</td>
              <td> {{$data->comunicacion}}</td>
            </tr>

            <tr>
              <td>Trabajo independiente</td>
              <td>{{$data->trabajo_independiente}}</td>
            </tr>

            <tr>
              <td>toma la iniciativa</td>
              <td> {{$data->toma_iniciativa}}</td>
            </tr>

            <tr>
              <td>trabajo en grupo</td>
              <td> {{$data->trabajo_grupo}}</td>
            </tr>

            <tr>
              <td>productividad</td>
              <td>{{$data->productividad}}</td>
            </tr>

            <tr>
              <td>creatividad</td>
              <td>{{$data->creatividad}}</td>
              
            </tr>

            <tr>
              <td>honestidad</td>
              <td>{{$data->honestidad}}</td>
            </tr>

            <tr>
              <td>integridad</td>
              <td>{{$data->integridad}}</td>
            </tr>

            <tr>
              <td>relaciones con compañeros del trabajo</td>
              <td> {{$data->relaciones_compañeros_trabajo}}</td>
            </tr>

            <tr>
              <td>relaciones con los clientes</td>
              <td> {{$data->relaciones_clientes}}</td>
            </tr>

            <tr>
              <td>habilidades tecnicas</td>
              <td> {{$data->habilidades_tecnicas}}</td>
            </tr>

            <tr>
              <td>fiabilidad</td>
              <td>{{$data->fiabilidad}}</td>
            </tr>

            <tr>
              <td>puntualidad</td>
              <td>{{$data->puntualidad}}</td>
            </tr>

            <tr>
              <td>asistencia</td>
              <td>{{$data->asistencia}} </td>
            </tr>

            <tr>
              <td>Total</td>
              <td>{{$data->valoracion}}</td>
            </tr>


          </tbody>

        </table>
<br>
        <div>
          <label for="objetivos_alcanzados">Objetivos Alcanzados</label><br>
          <p>{{$data->objetivos_alcanzados}}</p>

        </div>

        <div>
          <label for="objetivos_proxima_evaluacion">Objetivos para la Proxima Evaluacion</label><br>
          <p>{{$data->objetivos_proxima_evaluacion}}</p>
          
        </div>

        <div>
          <label for="comentarios">Comentarios</label><br>
          <p>{{$data->comentarios}}</p>
        </div>

        
      

        <h5 class="col-5">Impreso en: {{now();}}</h5>
    </center>

  </div>

</section>


    
</body>
</html>