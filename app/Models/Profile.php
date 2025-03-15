<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'photo'];

    // Relationship with User model (one-to-one)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
