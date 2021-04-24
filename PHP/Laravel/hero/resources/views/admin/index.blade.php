@extends('layouts.app')
@section('content')
  <div class="row">
    <h1>Administrador de Hero</h1>
  </div>  
  <div class="row">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Entidad</th>
          <th>Cantidad Elementos</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($report as $item)
          <tr>
            <td>{{$item['name']}}</td>
            <td>{{$item['counter']}}</td>
            <td>
                <a href="{{route($item['route'])}}" class="btn {{$item['class']}}">Ir a {{$item['name']}}</a>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection