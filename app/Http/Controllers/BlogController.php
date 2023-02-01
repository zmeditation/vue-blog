<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{
    public function index()
    {
        return Inertia::render('Blogs/Index', [
            'blogs' => Blog::query()
                ->when(Request::input('search'), function ($query) {
                    $query->where('title', 'like', '%' . Request::input('search') . '%')
                        ->orWhere('content', 'like', '%' . Request::input('search') . '%');
                })
                ->orderBy('created_at', 'desc')
                ->paginate(5)
                ->withQueryString()
                ->map(function ($blog) {
                    return [
                        'id' => $blog->id,
                        'title' => $blog->title,
                        'content' => $blog->content,
                        'image' => asset('storage/' . $blog->image),
                        'user_id' => $blog->user_id,
                        'user_name' => User::find($blog->user_id)->name,
                        'created_at' => substr($blog->created_at , 0, 10),
                        'logged_in' => Auth::id(),
                    ];
                }),
        ]);
    }

    public function show(Blog $blog)
    {
        return Inertia::render('Blogs/Show', [
            'blog' => $blog,
            'user_name' => User::find($blog->user_id)->name,
            'logged_in' => Auth::id(),
        ]);
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
            'image' => asset('storage/' . $blog->image),
            'logged_in' => Auth::id(),
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
        if($blog->user_id != Auth::id()){
            return Redirect::route('blog.index');
        }

        Storage::delete('public/'. $blog->image);
        $blog->delete();

        return Redirect::route('blog.index');
    }
}
