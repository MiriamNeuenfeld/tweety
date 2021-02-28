<?php

namespace App\Models;

use App\Likable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model {
    use HasFactory, Likable;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getImageAttribute($value) {
        if ($value) {
            return asset('storage/' . $value);
        }
    }
}
