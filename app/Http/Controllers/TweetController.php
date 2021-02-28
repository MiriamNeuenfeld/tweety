<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller {

    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }

    public function store() {
        $attributes = request()->validate(['body' => 'required|max:255']);

        if (request('image')) {
            $attributes['image'] = request('image')->store('images');

            Tweet::create([
                'user_id' => auth()->id(),
                'body' => $attributes['body'],
                'image' => $attributes['image']
            ]);
        } else {
            Tweet::create([
                'user_id' => auth()->id(),
                'body' => $attributes['body'],
            ]);
        }

        return redirect()->route('home')->with('success','Tweet successfully added.');
    }

    public function destroy(Tweet $tweet) {
        $tweet->delete();

        return back();
    }
}
