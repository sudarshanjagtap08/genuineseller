<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familybuyer extends Model
{
    protected $fillable = [
        'buyer_id ', 
        'familymembername', // Add other fields here if needed
        'familymembernumber',
        'familymemberemail',
        'familymemberfblink',
        // Add other fields here if needed
    ];

    use HasFactory;
}
