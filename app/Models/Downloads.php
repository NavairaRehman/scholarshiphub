<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Downloads extends Model
{
    use HasFactory;

    protected $fillable = [
        'scholarship_id',
        'name',
        'link',
    ];

    // Define the relationship
    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class);
    }
}
