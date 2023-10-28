<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::where('user_id', auth()->user()->id)->inRandomOrder()->orderByRaw('created_at >= CURDATE() ASC')
        ->get();
        return view('user.blog.index',compact('blogs'));
    }

    public function create(){
        return view('user.blog.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'                => 'required|string',
            'description'          => 'required',
            'banner_image'         => 'required|mimes:jpeg,jpg,png',
        ]);

        $blog = [];

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $name = $file->getClientOriginalName();
            $uname = time() . '-' . $name;
            $file->move(public_path('blog'), $uname);
            $url = url('blog') . '/' . $uname;
            $blog['image'] = $url;
        }


            $blog['title'] = $request->title;
            $blog['description'] = $request->description;
            $blog['user_id'] = auth()->user()->id;

            Blog::create($blog);

            return redirect()->route('user.blog.index')->with('success','Blog Created Successfully');


    }

    public function edit($id){
        $blog = Blog::find($id);
        return view('user.blog.edit',compact('blog'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title'                => 'required|string',
            'description'          => 'required',
            'banner_image'         => 'nullable|mimes:jpeg,jpg,png',
        ]);

        $blog = Blog::find($id);

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $name = $file->getClientOriginalName();
            $uname = time() . '-' . $name;
            $file->move(public_path('blog'), $uname);
            $url = url('blog') . '/' . $uname;
            $blog['image'] = $url;
        }


            $blog['title'] = $request->title;
            $blog['description'] = $request->description;
            $blog['user_id'] = auth()->user()->id;

            $blog->update();

            return redirect()->route('user.blog.index')->with('success','Blog Updated Successfully');


    }

    public function delete($id)
    {
        $blog = Blog::find($id)->delete();
        return  redirect()->route('user.blog.index')->with('success', 'Blog Deleted Successfully');
    }
}
