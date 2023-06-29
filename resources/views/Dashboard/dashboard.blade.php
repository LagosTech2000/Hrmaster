@extends('layouts.app')
@section('title')
Dashboard
@endsection
@section('content')
<section>
    <div class="section-header" style="max-height: 3rem;">
    </div>
    <h5 style="background-color:white; padding:0.4rem; border-radius:1rem;" id="paseSalidaMensaje">Dashboard</h5>
    <br>

</section>

<div class="row">
<div class="me-5 col-5 card fs-3 text-dark bg-primary mb-3" >
  <div class="card-header "><i class="me-5 fs-2 text-warning fas fa-users"></i>&nbsp;Total de Evaluaciones: {{$totalEvaluaciones}} </div>  

    </div>    


<div class="ms-5 col-5 fs-3 card text-dark bg-primary mb-3" >
  <div class="card-header"><i class="fs-2 text-warning fas fa-file"></i>&nbsp; Total Empleados:  {{$totalUsuarios}}</div>  

</div>


<br>    

  <div class="row">

    <!-- tercer canvas -->

    <div class="me-3 col-5" style="width:50%; " >
      <canvas id="chart"></canvas>
    </div>

    <br>

    <!-- tercer canvas -->

    <div class="ms-5 col-5" style="width:50%;" >
                             <br> 

      <canvas id="chart2"></canvas>
    </div>
    
  </div>
  <br>
  <br>

  <div class="row">

    <!-- tercer canvas -->
    <div class="col-6" style="width:50%; " >
      <br>
      <br>
      <canvas id="chart3"></canvas>
    </div>

  

    
  </div>

<br>

@endsection

@section('scripts')
  
  <script>
 var ctx = document.getElementById('chart').getContext('2d');
var chart = new Chart(ctx, {
  type: 'bar', 
  data: {
    labels: {!! json_encode($data1->keys()) !!},
    datasets: [{
      label: 'Porcentaje de Valoración por Área',
      data: {!! json_encode($data1->values()) !!},
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

      
  <script>
 var ctx = document.getElementById('chart2').getContext('2d');
var chart = new Chart(ctx, {
  type: 'pie', 
  data: {
    labels: {!! json_encode($data2->keys()) !!},
    datasets: [{
      label: 'Suma de Valoración por Empleado',
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
      
@endsection 