<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodIngredient;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $models = Food::orderBy('id', 'desc')->get();
        $ingredients = Ingredient::all();
        return view('project.food', ['models' => $models, 'ingredients' => $ingredients]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'ingredients' => 'required|array',
        ]);

        $ids = $data['ingredients'];
        unset($data['ingredients']);

        $food = Food::create($data);
        // foreach($ids as $id){
        //     FoodIngredient::create(['ovqat_id' => $food->id, 'ingredient_id' => $id]);
        // }

        $food->ingredients()->attach($ids);

        return redirect()->route('food.index');
    }

    public function update(Request $request , Food $food)
    {
        $data = $request->validate([
            'name' => 'required',
            'ingredients' => 'required|array',
        ]);
        $ids = $data['ingredients'];
        unset($data['ingredients']);

        $food->update($data);
        $food->ingredients()->sync($ids);
        return redirect()->route('food.index');

    }

    public function delete(Food $food)
    {
        $food->delete();
        return redirect()->route('food.index');
    }
    
}
