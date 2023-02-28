<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use DB;
class FrontendController extends Controller
{
    function index()
    {
        $blog = DB::table('blogs')
            ->join('users', 'blogs.author_id', 'users.id')
            ->select('blogs.*','users.name')
            -> orderBy('id', 'desc')->take(4)->get()->shuffle();
        $allblog = DB::table('blogs')
            ->join('users', 'blogs.author_id', 'users.id')
            ->select('blogs.*','users.name')
            -> orderBy('id', 'desc')->get()->shuffle();
        return view('frontEnd.home.home',[
            'blogs' => $blog,
            'allblog' => $allblog
        ]);
    }
    function blogDetails($id)
    {
        $blog = DB::table('blogs')
            ->join('users', 'blogs.author_id', 'users.id')
            ->select('blogs.*','users.name')
            ->where('blogs.id', $id)
            ->first();

        $relatedBlog = DB::table('blogs')
            ->join('users', 'blogs.author_id', 'users.id')
            ->select('blogs.*','users.name')
            ->where('author_id', $blog->author_id)
            -> orderBy('id', 'desc')->take(3)->get()->shuffle();

//        $comments = DB::table('blogs')
//            ->join('comments','blogs.id','comments.blog_id')
//            ->select('comments.*')
//            ->where('blogs.id', );
        $comments = Comment::where('blog_id', $id)->orderBy('id', 'asc')->get();
        return view('frontEnd.blog.blog-details', [
            'blog' => $blog,
            'relatedBlog' => $relatedBlog,
            'comments' => $comments
        ]);
    }
}
