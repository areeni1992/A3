<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CategoryTranslation extends Model
{
    use HasFactory;

    protected $table = 'category_translations';
    public $timestamps = false;
    public $fillable  = [
        'name',
        'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug',
            ]
        ];
    }
}
