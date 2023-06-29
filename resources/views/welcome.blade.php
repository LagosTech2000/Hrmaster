{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hondutel</title> --}}

        <!-- Fonts -->
       

        <!-- Styles -->
      <!-- Bootstrap 4.1.1 -->
    {{-- <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>

    </head>
    <body> --}}

        {{-- esto lo ocupo
        <div class="d-flex flex-row-reverse" style="margin-right: 2rem">
            
            @if (Route::has('login'))
                <div>
                    @auth
                        <a style="margin-top: 0.5rem" class="btn btn-primary" type="button" href="{{ url('/home') }}" >Home</a>
                    @else
                        <a style="margin-top: 0.5rem"  class="btn btn-primary" href="{{ route('login') }}" >Iniciar sesion</a>

                    @endauth
                </div>
            </div>
            @endif

            
        </div>
     aqui termina lo que ocupo --}}
        

{{-- 
    </body>
</html> --}}


@extends('layouts.auth_app')
@section('title')
    Inicio
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header"></div>

        <div class="card-body">
            <div class="form-group">
            @if (Route::has('login'))
            <div>
                @auth
                    <a  class="btn btn-primary btn-lg btn-block" style="font-size: 15px" type="button" href="{{ url('/home') }}" >Home</a>
                @else
                    <a  class="btn btn-primary btn-lg btn-block" style="font-size: 15px" href="{{ route('login') }}" >Iniciar sesion</a>

                @endauth
            </div>
        </div>
        </div>
        @endif
                
        </div>
    </div>
@endsection

