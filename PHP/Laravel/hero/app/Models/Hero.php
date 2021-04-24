<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $table = 'heroes';

    public function level(){
        return $this->hasOne("App\Models\Level", "id", "level_id");
    }
}
