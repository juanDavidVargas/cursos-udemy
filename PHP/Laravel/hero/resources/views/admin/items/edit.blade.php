
@extends('layouts.app')

@section('content')
    <h1>Modificación de Items - {{$items->name}}</h1>

    <form action="{{route('admin.items.update', ['id' => $items->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" value="{{ $items->name }}" id="name" placeholder="Ingresar Nombre..." required>
        </div>
        <div class="form-group">
            <label for="hp">HP</label>
            <input type="number" class="form-control" name="hp" id="hp" value="{{ $items->hp }}" placeholder="Ingresar Vida..." required>
        </div>
        <div class="form-group">
            <label for="atq">Ataque</label>
            <input type="number" class="form-control" name="atq" id="atq" value="{{ $items->atq }}" placeholder="Ingresar Ataque..." required>
        </div>
        <div class="form-group">
            <label for="def">Defensa</label>
            <input type="number" class="form-control" name="def" id="def" value="{{ $items->def }}" placeholder="Ingresar Defensa..." required>
        </div>
        <div class="form-group">
            <label for="luck">Suerte</label>
            <input type="number" class="form-control" name="luck" id="luck" value="{{ $items->luck }}" placeholder="Ingresar Suerte..." required>
        </div>
        <div class="form-group">
            <label for="cost">Costo</label>
            <input type="number" class="form-control" name="cost" id="cost" value="{{ $items->cost }}" placeholder="Ingresar Costo..." required>
        </div>
        <div class="row">&nbsp;</div>
        <div class="form-group">
            <label for="img_path">Imagen</label>
            <input type="file" name="img_path" id="img_path">
        </div>
        <div class="row">&nbsp;</div>
        <div class="form-group">
            <button type="submit" class="btn btn-warning">Editar</button>
        </div>
    </form>
@endsection