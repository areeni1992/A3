<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['page_title', 'desc', 'short_desc', 'policy_name', 'policy_content'];

}
