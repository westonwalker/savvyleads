<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function plan() {
        return $this->belongsTo(Plan::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}