<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
    ];

    public function foods()
    {
        return $this->belongsToMany(Ingredient::class, "food_ingredients", 'ingredient_id', 'food_id');
    }
}
