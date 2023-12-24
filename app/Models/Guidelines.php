<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guidelines extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'scholarship_id',
        'description',
        'required_docs',
    ];

    // Define the relationship
    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class);
    }
}
