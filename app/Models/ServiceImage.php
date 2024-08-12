<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{


    use HasFactory;

    protected $fillable = ['id'," agent_id",'title', 'description'];

    public function files()
    {
        return $this->hasMany(ServiceImageFile::class, 'service_image_id');
    }
}
