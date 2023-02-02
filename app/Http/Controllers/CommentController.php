<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;


class CommentController extends Controller
{
     public function store(Blog $blog)
     {
        Comment::create([
            'user_id' => Auth::id(),
            'blog_id' => $blog->id,
            'content' => Request::input('content'),
        ]);

        return Redirect::back();
     }
}
