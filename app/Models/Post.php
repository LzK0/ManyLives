<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'published_at',
        'image_post',
        'user_id',
    ];
    protected $dates = ["publicado"]; //Adicionando o tipo datetime

    public function users() // Informando a chave estrangeira
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
