<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\BlogPost;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use PHPUnit\Framework\Attributes\Before;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $blog_posts = BlogPost::get();
        $blog_posts_trashed = BlogPost::onlyTrashed()->get();
        return view('blogPost.index', ["page_name" => "Blog Post"], compact('blog_posts', 'blog_posts_trashed'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreBlogPostRequest $request)
    {
        BlogPost::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'post' => $request->post,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogPostRequest $request)
    {
        BlogPost::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'post' => $request->post,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost, $id)
    {
        $blog_post = BlogPost::withTrashed()->find($id);
        return $blog_post;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogPost, $id)
    {
        // return $blogPost;
        $blog_post = BlogPost::find($id);
        return $blog_post;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogPostRequest $request, BlogPost $blogPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost, $id)
    {
        $blog_post = BlogPost::find($id);
        $isDeleted = $blog_post->delete();
        if ($isDeleted) {
            return back();
        }
    }
    public function destroyTrashSingleBlog(BlogPost $blogPost, $id)
    {
        $blog_post = BlogPost::onlyTrashed()->find($id);
        $isDeleted = $blog_post->forceDelete();
        if ($isDeleted) {
            return back();
        }
    }
    public function restore(BlogPost $blogPost, $id)
    {
        $blog_post = BlogPost::onlyTrashed()->find($id);
        $isRestore = $blog_post->restore();
        if ($isRestore) {
            return back();
        }
    }
}
