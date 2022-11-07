<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['page_title', 'short_desc', 'desc'];
}
