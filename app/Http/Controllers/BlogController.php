<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // /blogs -> get
    {
        $blogs = Blog::paginate(2);
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //blogs/create
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //blogs -> post
    {
        $reqs = $request->validate([
            'name' => 'required',
            'text' => 'required'
        ]);
        $reqs['user_id'] = 1;
        Blog::create($reqs);
        return redirect('/blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog) // blogs/{id}
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog) // blogs/1/edit
    {
       return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog) // blogs/1 ->patch/->put
    {
        $reqs = $request->validate([
            'name' => 'required',
            'text' => 'required'
        ]);

        $blog->update($reqs);
        return redirect('/blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog) // blogs/1 -> delete
    {
        $blog->delete();
        return redirect('/blogs');
    }
}
