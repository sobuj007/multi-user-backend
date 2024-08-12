<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProduct extends Model
{
    use HasFactory;
    protected $table = 'services_product';

    protected $fillable = [
        'agent_id', 'name', 'description', 'price', 'servicePrice', 'category', 'img_url',
        'subcategory', 'time', 'gender', 'location', 'rating', 'available', 'slot', 'bodypart'
    ];

    protected $casts = [
        'time' => 'array',
        'location' => 'array',
        'bodypart' => 'array',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
