<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [
        'agent_id', 'store', 'profile_image', 'owner_name', 'mobile', 'nid', 'trade_licence', 'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}
