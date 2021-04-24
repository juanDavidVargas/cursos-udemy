@extends('layouts.app')
@section('content')

<div class="row">
  <h1>Listado de Items</h1>
</div>
  
  <div class="row">
    <div class="col-md-4">
      <a href="{{route('admin.items.create')}}" class="btn btn-primary mt-2 mb-2">Crear Nuevo Item</a>
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
          <th>Costo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($items as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->hp}}</td>
          <td>{{$item->atq}}</td>
          <td>{{$item->def}}</td>
          <td>{{$item->luck}}</td>
          <td>{{$item->cost}}</td>
          <td>
            <div class="row">
              <div class="col">
                <a href="{{route('admin.items.edit', ['id' => $item->id])}}" class="btn btn-warning">Editar</a>
              </div>
              <div class="col">
                <form action="{{route('admin.items.destroy', ['id' => $item->id])}}" method="POST">
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