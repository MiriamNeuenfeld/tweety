<?php


namespace App;


use App\Models\Like;
use App\Models\User;

trait Likable {

    public function like(User $user = null, $liked = true) {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ], [
            'liked' => $liked
        ]);
    }

    public function dislike(User $user = null) {
        return $this->like($user, false);
    }

    public function isLikedBy(User $user) {
        return (bool) $this->likes->where('tweet_id', $this->id)->where('likes', true)->count();
    }

    public function isDislikedBy(User $user) {
        return (bool) $this->likes->where('tweet_id', $this->id)->where('likes', false)->count();
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }
}
