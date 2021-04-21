@extends('plantilla');
      
@section('seccion')
    <h1>Sistema de Votaciones</h1>
    <p class="my-5">Bienvenido al Sistema de votaciones, aquí podrá formular preguntas, agregar opciones de respuesta para cada una de estas, listarlas para poder votar sobre cada pregunta y ver los resultados de cada respuesta</p>

    <a href="{{route('pregunta')}}" class="btn btn-primary">Preguntas</a>
    <a href="{{route('opcionespreguntas')}}" class="btn btn-primary">Opciones de respuesta preguntas</a>
    <a href="{{route('listarpreguntas')}}" class="btn btn-primary">Realizar Votación</a>
@endsection