<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Question extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    protected $table = 'questions';
    protected $translationForeignKey = 'question_id';
    public $translatedAttributes  = ['question', 'answer'];
    protected $fillable = ['question', 'answer', 'parent_id'];

    public function faq()
    {
        return $this->belongsTo(Faq::class);
    }
}
