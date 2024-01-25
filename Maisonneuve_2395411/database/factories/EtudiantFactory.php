<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Etudiant;
use App\Models\Ville;

class EtudiantFactory extends Factory {
    
    // On en a besoin car le modèle el la db table correspondente n'ont pas le même nom (pour faciliter la db avec webdev)
    protected $model = Etudiant::class;

    public function definition() {

        // Obtient tous les 'id's dans le tableau 'villes' et les met dans un array
        $villeIds = Ville::pluck('id')->toArray();
        $randomIndex = random_int(0, count($villeIds) - 1);

        // Crée des faux noms sans prefix Mr./Dr./Prof ou suffix MD, III, PhD etc 
        $firstName = $this->faker->firstName;
        $lastName = $this->faker->lastName;
        $name = $firstName . ' ' . $lastName;
        
        // les noms des methodes (ex: phoneNumber) sont predéfinis par faker/laravel (on ne peut pas choisir n'importe quoi)
        return [
            'name' => $name,
            // 'name'=>$this->faker->name,
            'address'=>$this->faker->address,
            'phone'=>$this->faker->phoneNumber,
            // 'email'=>$this->faker->email,
            'birthday'=>$this->faker->date,

            // Les villes existent déjà, donc pas de faker
            'ville_id' => $villeIds[$randomIndex],
            
        ];
    }
}