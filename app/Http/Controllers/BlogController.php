<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\Category;

class BlogController extends Controller
{

    public function __construct()
  {
    //$this->middleware('auth',['only'=>'index']);
    //$this->middleware('auth',['except'=>'index','show']);
    $this->middleware('admin',['except'=>['index','show']]);
  }
    

  public function index()
  {

   $blogs = Blog::latest()->get(); 
   return view('blog.index',compact('blogs'));
 }

 public function create()
 {

  $category = Category::pluck('name','id');
   return view('blog.create',compact('category'));
 }

 public function store(Request $request)
 {
   $input = $request->all();
   
       



   $blog=Blog::create($input);

   if($categoryIds = $request->category_id){

    $blog->category()->sync($categoryIds);
   }

   return redirect('/blog');
   
 }


 public function show($id)
 {
   
   $blog = Blog::findOrFail($id);

   return view('blog.show',compact('blog'));

 }


 public function edit($id)
 {
   
   $category = Category::pluck('name','id');
   $blog = Blog::findOrFail($id);
   return view('blog.edit',compact('blog','category'));

 }


 public function update(Request $request,$id)
 {
   
   $input = $request->all();
   $blog = Blog::findOrFail($id);

   
     if($categoryIds = $request->category_id){

    $blog->category()->sync($categoryIds);
   }

   $blog->update($input);

     return redirect('/blog');

 }

 public function destroy(Request $request,$id)
 {
   
   $blog = Blog::findOrFail($id);
   $categoryIds = $request->category_id;

   $blog->category()->detach($categoryIds);
   $blog->delete($request->all());

   return redirect('/blog/bin');

 }

 public function bin()
 {

  $deletedblog = Blog::onlyTrashed()->get();

  return view('blog.bin',compact('deletedblog'));


}

public function restore($id)
{

  $restoredBlogs = Blog::onlyTrashed()->findOrFail($id);

  $restoredBlogs=$restoredBlogs->restore($restoredBlogs);


  return redirect('/blog');


}

public function destroyblog($id)
{
 
  $destroyBlogs = Blog::onlyTrashed()->findOrFail($id);

  $destroyBlogs->forceDelete($destroyBlogs);

  return  back();

}

}
