<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;

class BlogController extends Controller
{
    //

    public function index()
    {

    	$blogs = Blog::latest()->get(); 
    	return view('blog.index',compact('blogs'));
    }

    public function create()
    {
    	return view('blog.create');
    }

  public function store(Request $request)
    {
       $input = $request->all();
       
       //var_dump($input);

       Blog::create($input);

       return back();
 
    }


    public function show($id)
    {
     
     $blog = Blog::findOrFail($id);

    return view('blog.show',compact('blog'));

    }


    public function edit($id)
    {
     
     $blog = Blog::findOrFail($id);

    return view('blog.edit',compact('blog'));

    }


    public function update(Request $request,$id)
    {
     
     $input = $request->all();
     $blog = Blog::findOrFail($id);

       
       //var_dump($input);

       $blog->update($input);

    return back();

    }

        public function destroy(Request $request,$id)
    {
     
     $blog = Blog::findOrFail($id);

     $blog->delete($request->all());

      return redirect('/blog/bin');

    }

    public function bin()
    {

      $deletedblog = Blog::onlyTrashed()->get();

      return view('blog.bin',compact('deletedblog'));


    }

}
