<?php

namespace App\Models;

use App\Models\Tweet;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Followable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'avatar',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value) {
        return asset($value ?: '/images/default-avatar.gif');
    }

    public function timeline() {
        $friendsIds = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $friendsIds)
            ->orWhere('user_id', $this->id)
            ->latest()->get();
    }

    public function tweets() {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function path($append = '') {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }
}
