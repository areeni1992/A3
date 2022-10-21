<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class homePageTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable  = [
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
}
