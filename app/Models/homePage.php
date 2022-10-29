<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class homePage extends Model implements TranslatableContract
{
    use HasFactory, Translatable, Sluggable;

    protected $table = 'home_pages';
    protected $translationForeignKey = 'home_id';
    public $translatedAttributes  = [
        'slider_title',
        'slider_text',
        'first_banner_text',
        'second_banner_text',
        'third_banner_title',
        'third_banner_text',
        'fourth_banner_title',
        'fourth_banner_text',
        'catalog_text',
    ];
    protected $fillable = [
        'slider_image',
        'slider_title',
        'slider_text',
        'cat_ids',
        'page_ids',
        'first_banner',
        'first_banner_text',
        'second_banner',
        'second_banner_text',
        'third_banner_right',
        'third_banner_left',
        'third_banner_title',
        'third_banner_text',
        'fourth_banner',
        'fourth_banner_title',
        'fourth_banner_text',
        'catalog_image',
        'catalog',
        'catalog_text',
    ];


    protected $casts = ['cat_ids' => 'array', 'page_ids' => 'array'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug',
            ]
        ];
    }

}
