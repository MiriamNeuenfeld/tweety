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

    protected $guarded = [];

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
        if ($value) {
            return asset('storage/' . $value);
        }

        return asset('/images/default-avatar.gif');
    }

    public function getBannerAttribute($value) {
        if ($value) {
            return asset('storage/' . $value);
        }

        return asset('/images/default-profile-banner.jpg');
    }

    public function getPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

    public function timeline() {
        $friendsIds = $this->follows()->pluck('id');

        return Tweet::withLikes()
            ->whereIn('user_id', $friendsIds)
            ->orWhere('user_id', $this->id)
            ->latest()
            ->paginate(5);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function tweets() {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function path($append = '')
    {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }
}
