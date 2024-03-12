<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model {
    
    use HasFactory;
    protected $table = 'maisonn_etudiants';

    protected $fillable = ['name', 'address', 'phone', 'email', 'birthday', 'ville_id'];

    public $timestamps = false;

    public function etudiantHasVille() {
        return $this->hasOne('App\Models\Ville', 'id', 'ville_id');
    }
}

