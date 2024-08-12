<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id', 'name', 'gender', 'image', 'expertise', 'certificate_name', 'certificate_images', 'experience_year'
    ];

    protected $casts = [
        'certificate_images' => 'array',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}
