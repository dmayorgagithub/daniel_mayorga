@extends('plantilla')

@section('seccion')

<h1>Preguntas</h1>

<form action="{{route('preguntas.agregar')}}" method="post">
  @csrf
  @error('pregunta')
  <div class="alert alert-danger">
    La pregunta es obligatoria
  </div>
  @enderror
  <input class="form-control mb-2" type="text" name="pregunta" placeholder="Pregunta" value="{{old('pregunta')}}"/>
  <button class="btn btn-primary btn-block" type="submit">Agregar Pregunta</button>
</form>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Pregunta</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($preguntas as $info)
      <tr>
        <th scope="row">{{$info->id}}</th>
        <td>{{$info->pregunta}}</td>
        <td>Otto</td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection

