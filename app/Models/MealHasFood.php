<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class MealHasFood extends Model
{
    protected $table = 'meal_has_food';

    public function food(){
        return $this->hasOne(Food::class, 'id', 'food_id');
    }



}
