@extends('layouts.app')
@section('title')
Mis Evaluaciones
@endsection
@section('content')
<section>
    <div class="section-header" style="max-height: 3rem;">
    </div>
    <h5 style="background-color:white; padding:0.4rem; border-radius:1rem;" id="paseSalidaMensaje">Mis Evaluaciones:</h5>
    <br>
  
    <table id="permisoPersonal" class="table table-striped table-bordered table-sm text-center" style="width:100%">
        <thead style="background-color:#236355;">
            <tr>
                
                <th style="color: #fff;">Realizada en:</th>
                <th style="color: #fff;">Valoracion</th>
                <th style="color: #fff;">Accion</th>

            </tr>
        </thead>
        <tbody>

            @if(isset($data))

            @foreach($data as $d)
            <tr>

                <td>{{ $d['eval_created_at'] }}</td>
                <td>{{ $d['valoracion']}}</td>
                <form action="{{route('evaluacion-resumen')}}" method="post">
                @csrf
                    <td>
                        <input type="hidden" name="id" value="{{$d['id']}}">
                        <input class="btn btn-primary" type="submit" value="pdf">

                </form>


                </td>
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