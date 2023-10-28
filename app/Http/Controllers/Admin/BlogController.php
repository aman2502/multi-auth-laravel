<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function blog(){
        $blogs = Blog::with('user')->inRandomOrder()->orderByRaw('created_at >= CURDATE() ASC')
        ->get();
        return view('admin.blog.index',compact('blogs'));
    }
}
