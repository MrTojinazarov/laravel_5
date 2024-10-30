<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\FoodIngredient;
use App\Models\Ingredient;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        for($i=1; $i < 11; $i++){
            Ingredient::create(['name' => 'Ingredient' . $i]);
        }

        for($i=1; $i < 11; $i++){
            Food::create(['name' => 'Food' . $i]);
        }

        for($i=1; $i < 100; $i++){
            FoodIngredient::create([
                'food_id' => rand(1, 10),
                'ingredient_id' =>rand(1, 10),
            ]);
        }
    }
}
