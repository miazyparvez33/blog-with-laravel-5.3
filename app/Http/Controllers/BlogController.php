<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;
use App\Photo;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    public function __construct()
  {
    //$this->middleware('auth',['only'=>'index']);
    //$this->middleware('auth',['except'=>'index','show']);
    $this->middleware('both',['except'=>['create','store','edit','update']]);
    $this->middleware('admin',['only'=>['publish','destroy','bin','destroyblog','restore']]);
  }
    

  public function index()
  {

   $blogs = Blog::where('status',0)->latest()->get(); 
   return view('blog.index',compact('blogs'));
 }

 public function create()
 {

  $category = Category::pluck('name','id');
   return view('blog.create',compact('category'));
 }

 public function store(Request $request)
 {


  $rules = [
    
   'title'=>['required','min:20','max:200','unique:blogs'],
   'body'=>['required','min:200'],
   'photo_id'=>['mimes:jpeg,jpg,png','max:1024'],
   'category_id'=>['required'],
   'meta_desc'=>['required','min:25','max:300'],
 
  ];

  $message = [
   
     'photo_id.mimes' => 'Your Image Must Be jpeg,jpg or png',
     'photo_id.max' => 'Your Image Should Not Be Larger Then 1Mb',

  ];

  $this->validate($request,$rules,$message);


   $input = $request->all();

   $input['slug'] = str_slug($request->title);
   $input['meta_title'] = $request->title;
   $input['user_id'] = Auth::user()->id;

   // dd($input);

   if($file = $request->file('photo_id'))
   {

    $name =$file->getClientOriginalName();
    $file->move('images',$name);
    $photo = Photo::create(['photo' => $name, 'title'=>$name]);
    $input['photo_id'] = $photo->id;
   }
   
      

   $blog=Blog::create($input);

   if($categoryIds = $request->category_id){

    $blog->category()->sync($categoryIds);
   }

   // Session::flash('flash_message','You Have Just Created a Blog');


   notify()->flash('<h2> You Have Successfully Created a Blog </h2>','success',['timer'=>2500]);

   return redirect('blog');
   
 }


 public function show($slug)
 {
   
   $blog = Blog::whereSlug($slug)->first();

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
   

  $rules = [
    
   'title'=>['required','min:20','max:200'],
   'body'=>['required','min:200'],
   'photo_id'=>['mimes:jpeg,jpg,png','max:1024'],
   // 'category_id'=>['required'],
   // 'meta_desc'=>['required','min:25','max:300'],
 
  ];

    $this->validate($request,$rules);
   
   $input = $request->all();

   $blog = Blog::findOrFail($id);

      if($file = $request->file('photo_id'))
   {

    if($blog->photo){

      unlink('images/' .$blog->photo->photo);
      $blog->photo()->delete('photo');
    }


    $name =$file->getClientOriginalName();

    $file->move('images',$name);
    $photo = Photo::create(['photo' => $name, 'title'=>$name]);

    $input['photo_id'] = $photo->id;
   }
   

   
     if($categoryIds = $request->category_id){

    $blog->category()->sync($categoryIds);
   }

   $blog->update($input);

    notify()->flash('<h2> You Have Successfully Updated a Blog </h2>','success',['timer'=>2500]);

     return redirect('blog');

 }


 public function publish(Request $request,$id){


   $input = $request->all();
   $blog = Blog::findOrFail($id);
   $blog->update($input);

   return redirect('admin');
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
      if($destroyBlogs->photo){

      unlink('images/' .$destroyBlogs->photo->photo);
      $destroyBlogs->photo()->delete('photo');
    }

  $destroyBlogs->forceDelete($destroyBlogs);

  return  back();

}

}
