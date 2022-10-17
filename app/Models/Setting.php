<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
            'facebook',
            'twitter',
            'instagram',
            'linkedin',
            'google',
            'whatsapp',
            'telephone',
            'email',
            'quotationtitle',
            'quotationtext',
            'logo'
        ];
}
