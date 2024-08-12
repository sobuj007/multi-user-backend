<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'img',
        'selectedTime',
        'selectedDate',
        'selectedServicsQun',
        'selectedProductQun',
        'orderfor',
        'services_product_id',
        'orderstatus'
    ];

    public function servicesProduct()
    {
        return $this->belongsTo(ServicesProduct::class, 'services_product_id');
    }
}
