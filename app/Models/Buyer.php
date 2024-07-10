<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;
    public function familybuyers()
    {
        return $this->hasMany(FamilyBuyer::class); 
    }
    public function friendbuyers()
    {
        return $this->hasMany(FriendBuyer::class); 
    }
}
