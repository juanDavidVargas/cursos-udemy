<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\Enemy;
use App\Models\Item;

class AdminController extends Controller
{
    public function index(){
        $heroCounter = Hero::count();
        $itemCounter = Item::count();
        $enemyCounter = Enemy::count();

        $report = [
            ['name' => 'Heroes', "counter" => $heroCounter, 'route' => 'admin.heroes', 'class' => 'btn-primary'],
            ['name' => 'Items', "counter" => $itemCounter, 'route' => 'admin.items', 'class' => 'btn-warning'],
            ['name' => 'Enemies', "counter" => $enemyCounter, 'route' => 'admin.enemies', 'class' => 'btn-danger']
        ];

        return view('admin.index', ['report' => $report]);
    }
}
