<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Page extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use Sluggable;

    protected $table = 'pages';
    protected $translationForeignKey = 'page_id';

    public $translatedAttributes  = ['title', 'content', 'shortdesc', 'slug'];
    protected $fillable = ['title', 'content', 'image', 'status', 'shortdesc', 'slug'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug',
            ]
        ];
    }

}
