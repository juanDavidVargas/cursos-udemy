@extends('layouts.app')
@section('content')

<div class="row">
  <h1>Listado de Heroes</h1>
</div>
  
  <div class="row">
    <div class="col-md-4">
      <a href="{{route('admin.heroes.create')}}" class="btn btn-primary mt-2 mb-2">Crear Nuevo Heroe</a>
    </div>
  </div>

  <div class="row">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>HP</th>
          <th>Ataque</th>
          <th>Defensa</th>
          <th>Suerte</th>
          <th>Monedas</th>
          <th>Experiencia</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($heroes as $hero)
        <tr>
          <td>{{$hero->id}}</td>
          <td>{{$hero->name}}</td>
          <td>{{$hero->hp}}</td>
          <td>{{$hero->atq}}</td>
          <td>{{$hero->def}}</td>
          <td>{{$hero->luck}}</td>
          <td>{{$hero->coins}}</td>
          <td>{{$hero->xp}}</td>
          <td>
            <div class="row">
              <div class="col">
                <a href="{{route('admin.heroes.edit', ['id' => $hero->id])}}" class="btn btn-warning">Editar</a>
              </div>
              <div class="col">
                <form action="{{route('admin.heroes.destroy', ['id' => $hero->id])}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection