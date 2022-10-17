<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
class Product extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use Sluggable;

    protected $table = 'products';
    protected $translationForeignKey = 'product_id';
    public $translatedAttributes  = ['name', 'desc', 'slug'];
    protected $fillable = ['name', 'image', 'desc', 'slug', 'parent_id', 'price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug',
            ]
        ];
    }
}
