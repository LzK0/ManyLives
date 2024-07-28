<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $dates = ["publicado"]; //Adicionando o tipo datetime

    public function user() // Informando a chave estrangeira
    {
        return $this->belongsTo(User::class);
    }

}
