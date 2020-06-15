<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Food extends Model
{
    protected $table = 'foods';

    public function type(){
        return $this->hasOne(Type::class, 'id', 'type_id');
    }



}
