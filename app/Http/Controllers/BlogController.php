<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{
    public function index()
    {
        return Inertia::render('Blogs/Index',
            [
                'blogs' => Blog::all()->map(function($blog){
                    return [
                        'id' => $blog->id,
                        'title' => $blog->title,
                        'content' => $blog->content,
                        'image' => asset('storage/' . $blog->image),
                        'user_id' => $blog->user_id,
                        'user_name' => User::find($blog->user_id)->name,
                    ];
                })
            ]
        );
    }

    public function create()
    {
        return Inertia::render('Blogs/Create');
    }

    public function store()
    {
        $image = Request::file('image')->store('blogs', 'public');

        Blog::create([
            'title' => Request::input('title'),
            'content' => Request::input('content'),
            'image' => $image,
            'user_id' => auth()->user()->id,
        ]);

        return Redirect::route('blog.index');
    }

    public function edit(Blog $blog)
    {
        return Inertia::render('Blogs/Edit', [
            'blog' => $blog,
            'image' => asset('storage/' . $blog->image)
        ]);
    }

    public function update(Blog $blog)
    {
        $image = $blog->image;

        if(Request::file('image')){
            Storage::delete('public/'. $blog->image);
            $image = Request::file('image')->store('blogs', 'public');

        }

        $blog->update([
            'title' => Request::input('title'),
            'content' => Request::input('content'),
            'image' => $image,
        ]);

        return Redirect::route('blog.index');
    }

    public function delete(Blog $blog)
    {
        Storage::delete('public/'. $blog->image);
        $blog->delete();

        return Redirect::route('blog.index');
    }
}
