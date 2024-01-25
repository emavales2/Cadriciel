<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model {
    
    use HasFactory;

    protected $table = 'maisonn_etudiants';

    protected $fillable = ['id','name', 'address', 'phone', 'birthday', 'ville_id'];

    public $timestamps = false;

    public function etudiantHasVille() {
        
        return $this->hasOne('App\Models\Ville', 'id', 'ville_id');
    }

    public function etudiantHasUser() {
        // return $this->hasOne('App\Models\User', 'id', 'id');
        return $this->belongsTo(User::class, 'id', 'id');
    }
}