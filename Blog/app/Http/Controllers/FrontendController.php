<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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
        return view('frontEnd.master',[
            'blogs' => $blog,
        ]);
    }
}
