@extends('plantilla')

@section('seccion')

<h1>Opciones de respuesta preguntas</h1>

<form action="{{route('opcionrespuesta.agregar')}}" method="post">
  @csrf
  @error('opcion')
  <div class="alert alert-danger">
    La opcion es obligatoria
  </div>
  @enderror
  @error('idpregunta')
  <div class="alert alert-danger">
    La pregunta es obligatoria
  </div>
  @enderror
  <input class="form-control mb-2" type="text" name="opcion" placeholder="Opcion pregunta" value="{{old('opcion')}}"/>
  <select class="form-select mb-2" required name="idpregunta">
    @foreach($preguntas as $info)
        <option value="{{$info->id}}">{{$info->pregunta}}</option>
      @endforeach
  </select>
  <button class="btn btn-primary btn-block" type="submit">Agregar Opcion Respuesta</button>
</form>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Pregunta</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($preguntas as $pregunta)
      <tr>
        <th scope="row">{{$pregunta->id}}</th>
        <td>{{$pregunta->pregunta}}</td>
        <td>
          <ol>
            @foreach($opciones as $info)
              @if($pregunta->id == $info->idpregunta)
                <li>{{$info->opcion}}</li>
              @endif
            @endforeach
          </ol>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection

