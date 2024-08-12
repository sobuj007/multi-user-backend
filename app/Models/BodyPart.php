<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodyPart extends Model
{
    use HasFactory;

    protected $fillable = ['subcategory_id', 'bodypart_name', 'image'];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

}
