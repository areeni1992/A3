<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Career extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    protected $table = 'careers';
    protected $translationForeignKey = 'career_id';
    public $translatedAttributes  = ['page_title', 'desc', 'short_desc'];
    protected $fillable = [
        'page_title',
        'desc',
        'short_desc',
        'background',
        'start_date',
        'end_date',
        'desired_position',
        'name',
        'age',
        'gender',
        'nationality',
        'educational_background',
        'date_of_barth',
        'visa_status',
        'general_questions',
        'employment_questions',
        'attachment',
        'ok'
    ];

    protected $casts = ['general_questions' => 'array', 'employment_questions' => 'array'];
}
