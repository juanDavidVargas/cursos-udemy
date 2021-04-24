<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enemy;
use App\Models\Hero;

class BSController extends Controller
{
    public function index(){
        return view('admin.bs.index', $this->runAutoBattle(2,1));
    }

    public static function runAutoBattle($heroId, $enemyId){
        $hero = Hero::find($heroId);
        $enemy = Enemy::find($enemyId);
        $events = [];

        while($hero->hp > 0 && $enemy->hp > 0){
            $luck = random_int(0, 100);

            if($luck >= $hero->luck){
                $hp = $enemy->def - $hero->atq;

                if($hp< 0){
                    $enemy->hp -= $hp * -1;
                }

                if($enemy->hp > 0){
                    $ev = [
                        "winner" => "hero",
                        "text" => $hero->name . " hizo un daño de " . $hero->atq . " puntos a " . $enemy->name
                    ];
                } else {
                    $ev = [
                        "winner" => "hero",
                        "text" => $hero->name . " acabó con la vida de " . $enemy->name . " y gano " . $enemy->xp . " puntos de experiencia."
                    ];

                    $hero->xp = $hero->xp + $enemy->xp;

                    if($hero->xp >= $hero->level->xp){
                        $hero->xp = 0;
                        $hero->level_id += 1; 
                        $hero->hp += 10;
                        $hero->atq += 10;
                        $hero->def += 10;
                        $hero->luck += 5;
                        $hero->coins += 2;
                    }

                    $hero->save();
                }

            } else {
                $hp = $hero->def - $enemy->atq;

                if($hp < 0){
                    $hero->hp -= $hp * -1;
                }

                if($hero->hp > 0){
                    $ev = [
                        "winner" => "enemy",
                        "text" => $hero->name . " recibió un daño de " . $enemy->atq . " puntos por " . $enemy->name
                    ];
                } else {
                    $ev = [
                        "winner" => "enemy",
                        "text" => $hero->name . " fue asesinado por " . $enemy->name
                    ];
                }
            }
            array_push($events, $ev);
        }
        return [
            "events" => $events,
            "heroName" => $hero->name,
            "enemyName" => $enemy->name,
            "heroAvatar" => $hero->img_path,
            "enemyAvatar" => $enemy->img_path
        ];
    }

    public function runManualBattle($heroId, $enemyId){
        $hero = Hero::find($heroId);
        $enemy = Enemy::find($enemyId);

        $luck = random_int(0, 100);

        if($luck > $hero->luck){
            $hp = $enemy->def - $hero->atq;

            if($hp < 0){
                $enemy->hp -= $hp * -1;
            }

            if($enemy->hp > 0){
               return [
                    "winner" => "hero",
                    "text" => $hero->name . " hizo un daño de " . $hero->atq . " puntos a " . $enemy->name
                ];
            } else {
                return [
                    "winner" => "hero",
                    "text" => $hero->name . " acabó con la vida de " . $enemy->name . " y gano " . $enemy->xp . " puntos de experiencia."
                ];

                $hero->xp = $hero->xp + $enemy->xp;

                if($hero->xp >= $hero->level->xp){
                    $hero->xp = 0;
                    $hero->level_id += 1;
                }
                $hero->save();
            }
        } else {
            $hp = $hero->def - $enemy->atq;

            if($hp < 0){
                $hero->hp -= $hp * -1;
            }

            if($hero->hp > 0){
                return [
                    "winner" => "enemy",
                    "text" => $hero->name . " recibió un daño de " . $enemy->atq . " puntos por " . $enemy->name
                ];
            } else {
               return [
                    "winner" => "enemy",
                    "text" => $hero->name . " fue asesinado por " . $enemy->name
                ];
            }
        }
    }

}
