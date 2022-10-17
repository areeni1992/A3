<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class PageTranslation extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'page_translations';

    public $timestamps = false;
    protected $fillable = ['title', 'content', 'shortdesc', 'slug'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug',
            ]
        ];
    }
}
