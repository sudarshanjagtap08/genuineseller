<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    public function familysellers()
    {
        return $this->hasMany(FamilySeller::class); 
    }
    public function friendsellers()
    {
        return $this->hasMany(FriendSeller::class); 
    }
}
