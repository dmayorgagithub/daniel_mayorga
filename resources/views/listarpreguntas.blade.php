@extends('plantilla')

@section('seccion')
<h1> Listado de Preguntas </h1>
<form action="{{route('listarpreguntas')}}" method="post">
  @csrf
  
    @error('opcion_*')
    <div class="alert alert-danger">
        La opción de respuesta es obligatoria
    </div>
    @enderror
  
    @foreach($preguntas as $pregunta)
        <label class="form-label mb-4 mt-4 fs-3 fw-bold">
            {{$pregunta->pregunta}}
        </label> 
        @foreach($opciones as $opcion)
            @if($pregunta->id == $opcion->idpregunta)
        <input type="text" hidden value="{{$pregunta->id}}">
            <div class="form-check p-1 mb-2 ms-5" >
                <input class="form-check-input" value="{{$opcion->id}}" type="radio" required name="opcion" id="opcion_{{$pregunta->id}}">
                <label class="form-check-label" for="opcion_{{$pregunta->id}}">
                    {{$opcion->opcion}}
                </label>
            </div>
            @endif
        @endforeach
    @endforeach
    <br/>
  <button class="btn btn-primary btn-block" type="submit">Votar</button>
</form>
@endsection