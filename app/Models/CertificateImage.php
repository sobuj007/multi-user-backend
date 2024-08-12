<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateImage extends Model
{
    use HasFactory;


    protected $fillable = ['agent_id', 'title', 'description'];
    public function user()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
    public function files()
    {
        return $this->hasMany(CertificateImageFile::class);
    }
}

