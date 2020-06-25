<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Meal extends Model
{
    protected $table = 'meals';

    public function foods(){
        return $this->hasMany(MealHasFood::class, 'meal_id', 'id');
    }



}
