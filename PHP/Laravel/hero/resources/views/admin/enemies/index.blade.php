@extends('layouts.app')
@section('content')

<div class="row">
  <h1>Listado de Enemigos</h1>
</div>
  
  <div class="row">
    <div class="col-md-4">
      <a href="{{route('admin.enemies.create')}}" class="btn btn-primary mt-2 mb-2">Crear Nuevo Enemigo</a>
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
          <th>Monedas</th>
          <th>Experiencia</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($enemies as $enemy)
        <tr>
          <td>{{$enemy->id}}</td>
          <td>{{$enemy->name}}</td>
          <td>{{$enemy->hp}}</td>
          <td>{{$enemy->atq}}</td>
          <td>{{$enemy->def}}</td>
          <td>{{$enemy->coins}}</td>
          <td>{{$enemy->xp}}</td>
          <td>
            <div class="row">
              <div class="col">
                <a href="{{route('admin.enemies.edit', ['id' => $enemy->id])}}" class="btn btn-warning">Editar</a>
              </div>
              <div class="col">
                <form action="{{route('admin.enemies.destroy', ['id' => $enemy->id])}}" method="POST">
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