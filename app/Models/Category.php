<?php

namespace App\Models;

use App\Http\Controllers\HomePageController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';


    protected $fillable = ['name', 'slug', 'parent_id'];

    public function subcategory()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function homePage()
    {
        return $this->belongsTo(HomePageController::class);
    }

}
