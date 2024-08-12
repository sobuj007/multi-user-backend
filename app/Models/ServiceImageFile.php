<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceImageFile extends Model
{
    use HasFactory;
    protected $fillable = ['service_image_id', 'path'];

    public function serviceImage()
    {
        return $this->belongsTo(ServiceImage::class);
    }
}
