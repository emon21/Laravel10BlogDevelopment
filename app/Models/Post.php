<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['id','category_id','user_id','post_title','slug','post_description','post_photo','status'];

    // protected $dates = ['published_at'];

    protected $dates = [
        'published_at',
        //'published_at' => 'date:Y-m-d',
        // 'joined_at' => 'datetime:Y-m-d H:00',
    ];



    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    public function comments(){
        return $this->hasMany(Comment::class);
      }

}
