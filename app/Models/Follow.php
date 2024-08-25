<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = ['id_follower', 'id_followed'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'follows', 'id_followed', 'id_follower');
    }
}
