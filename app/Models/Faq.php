<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Faq extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    protected $table = 'faqs';
    protected $translationForeignKey = 'faqs_id';
    public $translatedAttributes  = ['page_title', 'desc', 'short_desc', 'faq_name'];
    protected $fillable = ['page_title', 'desc', 'short_desc', 'faq_name', 'publish_for'];

    public function questions()
    {

        return $this->hasMany(Question::class);
    }
}
