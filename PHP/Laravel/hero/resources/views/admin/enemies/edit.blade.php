
@extends('layouts.app')

@section('content')
    <h1>Modificación de Enemigos - {{$enemy->name}}</h1>

    <form action="{{route('admin.enemies.update', ['id' => $enemy->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" value="{{ $enemy->name }}" id="name" placeholder="Ingresar Nombre..." required>
        </div>
        <div class="form-group">
            <label for="hp">HP</label>
            <input type="number" class="form-control" name="hp" id="hp" value="{{ $enemy->hp }}" placeholder="Ingresar Vida..." required>
        </div>
        <div class="form-group">
            <label for="atq">Ataque</label>
            <input type="number" class="form-control" name="atq" id="atq" value="{{ $enemy->atq }}" placeholder="Ingresar Ataque..." required>
        </div>
        <div class="form-group">
            <label for="def">Defensa</label>
            <input type="number" class="form-control" name="def" id="def" value="{{ $enemy->def }}" placeholder="Ingresar Defensa..." required>
        </div>
        <div class="form-group">
            <label for="coins">Monedas</label>
            <input type="number" class="form-control" name="coins" id="coins" value="{{ $enemy->coins }}" placeholder="Ingresar Monedas..." required>
        </div>
        <div class="form-group">
            <label for="xp">XP</label>
            <input type="number" class="form-control" name="xp" id="xp" value="{{ $enemy->xp }}" placeholder="Ingresar XP..." required>
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