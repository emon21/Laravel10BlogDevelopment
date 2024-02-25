<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','description'];


    // public function posts()
    // {
    //     return $this->belongsToMany(Post::class);
    // }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    // public function posts()
    // {
    //     return $this->hasMany(Post::class);
    // }
}
