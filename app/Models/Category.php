<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category_name','category_slug'];


    protected $appends = ['image_url'];

    //Accessor
   public function getImageUrlAttribute()
   {
      if (is_null($this->image)) {
         return asset('backend/category/default_image.png');
      }

      return asset($this->image);
   }

    //Posts Relationship
    public function posts()
    {
      return $this->hasOne(Post::class);
    }

}
