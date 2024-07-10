<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familyseller extends Model
{
    use HasFactory;
    protected $fillable = [
        'seller_id ', 
        'familymembername', // Add other fields here if needed
        'familymembernumber',
        'familymemberemail',
        'familymemberfblink',
        // Add other fields here if needed
    ];
}
