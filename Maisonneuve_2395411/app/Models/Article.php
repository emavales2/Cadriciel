<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'maisonn_articles';
    protected $fillable = ['title', 'art_body', 'user_id', 'date'];

    public function articleHasUser() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
