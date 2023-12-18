<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ville;

class VilleFactory extends Factory {

    // On en a besoin car le modèle el la db table correspondente n'ont pas le même nom (pour faciliter la db avec webdev)
    protected $model = Ville::class;

    public function definition() {

        return [
            'name'=>$this->faker->city,
        ];
    }
}
