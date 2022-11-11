<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Policy extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $table = 'policy';
    protected $translationForeignKey = 'policy_id';
    public $translatedAttributes  = ['page_title', 'desc', 'short_desc', 'policy_name', 'policy_content'];
    protected $fillable = ['page_title', 'desc', 'short_desc', 'policy_name', 'policy_content', 'publish_for'];
}
