<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Agent extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    protected $table = 'agents';
    protected $translationForeignKey = 'agents_id';
    public $translatedAttributes  = ['page_title', 'desc', 'short_desc'];

    protected $fillable = [
        'page_title',
        'desc',
        'short_desc',
        'background',
        'insert_by',
        'name_of_the_company',
        'office_address',
        'billing_address',
        'shipping_address',
        'business_organiz',
        'type_of_buyer',
        'payment_method',
        'currency',
        'bank_details',
        'key_personnel_contact',
        'order_info',
        'shipment_method',
        'port_of_shipment',
        'preferred_shipment_pricing',
        'attachment',
    ];

    protected $casts = [
        'name_of_the_company' => 'array',
        'office_address' => 'array',
        'billing_address' => 'array',
        'shipping_address' => 'array',
        'bank_details' => 'array',
        'key_personnel_contact' => 'array',
    ];

}
