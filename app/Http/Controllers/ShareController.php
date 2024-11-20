<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class ShareController extends Controller
{
    //
    public function shareOnFacebook($id)
    {
        $post = Posts::findOrFail($id);
        $url = urlencode(route('post.show', $post->id)); // URL bài viết
        $facebookShareUrl = "https://www.facebook.com/sharer/sharer.php?u=$url";
        
        return redirect()->away($facebookShareUrl);
    }

    public function shareOnTwitter($id)
    {
        $post = Posts::findOrFail($id);
        $url = urlencode(route('post.show', $post->id));
        $text = urlencode("Xem bài viết này:");
        $twitterShareUrl = "https://twitter.com/intent/tweet?url=$url&text=$text";
        
        return redirect()->away($twitterShareUrl);
    }

    public function copyLink($id)
    {
        $post = Post::findOrFail($id);
        $url = route('post.show', $post->id);

        return response()->json(['url' => $url]);
    }
}
