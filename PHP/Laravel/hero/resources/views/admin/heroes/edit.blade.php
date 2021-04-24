
@extends('layouts.app')

@section('content')
    <h1>Modificación de Heroes - {{$hero->name}}</h1>

    <form action="{{route('admin.heroes.update', ['id' => $hero->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" value="{{ $hero->name }}" id="name" placeholder="Ingresar Nombre..." required>
        </div>
        <div class="form-group">
            <label for="hp">HP</label>
            <input type="number" class="form-control" name="hp" id="hp" value="{{ $hero->hp }}" placeholder="Ingresar Vida..." required>
        </div>
        <div class="form-group">
            <label for="atq">Ataque</label>
            <input type="number" class="form-control" name="atq" id="atq" value="{{ $hero->atq }}" placeholder="Ingresar Ataque..." required>
        </div>
        <div class="form-group">
            <label for="def">Defensa</label>
            <input type="number" class="form-control" name="def" id="def" value="{{ $hero->def }}" placeholder="Ingresar Defensa..." required>
        </div>
        <div class="form-group">
            <label for="luck">Suerte</label>
            <input type="number" class="form-control" name="luck" id="luck" value="{{ $hero->luck }}" placeholder="Ingresar Suerte..." required>
        </div>
        <div class="form-group">
            <label for="coins">Monedas</label>
            <input type="number" class="form-control" name="coins" id="coins" value="{{ $hero->coins }}" placeholder="Ingresar Monedas..." required>
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