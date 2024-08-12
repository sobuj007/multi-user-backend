<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionAd extends Model
{
    use HasFactory;

    protected $table = 'promotions_ads';

    protected $fillable = ['name', 'image', 'description'];
}
