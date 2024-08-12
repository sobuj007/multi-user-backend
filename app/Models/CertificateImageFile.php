<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateImageFile extends Model
{
    use HasFactory;
    protected $fillable = ['certificate_image_id', 'path'];

    public function certificateImage()
    {
        return $this->belongsTo(CertificateImage::class);
    }
}
