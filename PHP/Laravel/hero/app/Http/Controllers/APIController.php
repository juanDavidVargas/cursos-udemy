<?php

namespace App\Http\Controllers;
use App\Models\Hero;
use App\Models\Enemy;
use App\Models\Item;
use App\Http\Controllers\BSController;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function index(){
        $res = [
            "status" => "OK", 
            "message" => "La API funciona correctamente!"
        ];

        return response()->json($res, 200);
    }

    public function getAllHeroes(){
        $heroes = Hero::all();

        $res = [
            "status" => "OK",
            "message" => "Lista de Heroes",
            "data" => $heroes
        ];

        return response()->json($res, 200);
    }

    public function getHeroe($id){
        $hero = Hero::find($id);

        if(isset($hero)){
            $res = [
                "status" => "OK",
                "message" => "Obtener Heroe " . $hero->name,
                "data" => $hero
            ];

            return response()->json($res, 200);
        } else {
            $res = [
                "status" => "error",
                "message" => "No se encontró heroe"
            ];
            return response()->json($res, 404);
        }
    }

    public function getAllEnemies(){
        $enemies = Enemy::all();

        $res = [
            "status" => "OK",
            "message" => "Lista de enemigos",
            "data" => $enemies
        ];
        return response()->json($res, 200);
    }

    public function getEnemy($id){
        $enemy = Enemy::find($id);

        if(isset($enemy)){
            $res = [
                "status" => "OK",
                "message" => "Obtener Enemigo " . $enemy->name,
                "data" => $enemy
            ];

            return response()->json($res, 200);
        } else {
            $res = [
                "status" => "error",
                "message" => "No se encontró enemigo"
            ];
            return response()->json($res, 404);
        }
    }

    public function getAllItems(){
        $items = Item::all();

        $res = [
            "status" => "OK",
            "message" => "Lista de items",
            "data" => $items
        ];
        return response()->json($res, 200);
    }

    public function getItem($id){
        $item = Item::find($id);

        if(isset($item)){
            $res = [
                "status" => "OK",
                "message" => "Obtener Item " . $item->name,
                "data" => $item
            ];

            return response()->json($res, 200);
        } else {
            $res = [
                "status" => "error",
                "message" => "No se encontró item"
            ];
            return response()->json($res, 404);
        }
    }

    public function runManualBS($heroId, $enemyId){
        $bs = BSController::runAutoBattle($heroId, $enemyId);

        $res = [
            "status" => "OK",
            "message" => "Sistema de batalla entre " . $bs['heroName'] . " y " . $bs['enemyName'],
            "data" => $bs
        ];

        return response()->json($res, 200);
    }
}
