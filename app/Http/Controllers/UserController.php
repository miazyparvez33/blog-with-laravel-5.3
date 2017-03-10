<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Photo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  public function __construct()
  {
   
    $this->middleware('admin',['only'=>['userslist']]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::pluck('name','id');

        return view('users.index',compact('users','roles'));
    }


        public function userslist()
    {
        $users = User::all();
        $roles = Role::pluck('name','id');

        return view('users.userslist',compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = User::whereUsername($username)->first();

        return view('users.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
       $user = User::whereUsername($username)->first();

        if(Auth::user()->id == $user->id){



        return view('users.edit',['user'=>$user]); 
        }

        else{
            return 'Insufficient Permission';
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {


     $rules = [
              'photo_id'=>['mimes:jpeg,jpg,png','max:100'],
              'name'=>['min:1','max:32'],
              'about'=>['min:20','max:1024'],
              ];

      $message = [
       
         'photo_id.mimes' => 'Your Image Must Be jpeg,jpg or png',
         'photo_id.max' => 'Your Image Should Not Be Larger Then 100kb',

      ];


     $this->validate($request,$rules,$message);


       $input = $request->all();
       $user = User::whereUsername($username)->first();



      if(Auth::user()->id == $user->id)
      {


           if($file = $request->file('photo_id'))
           {

            if($user->photo)
                {

                  unlink('images/' .$user->photo->photo);
                  $user->photo()->delete('photo');
                }


            $name =$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['photo' => $name, 'title'=>$name]);
            $input['photo_id'] = $photo->id;
           }
      }
     

       $user->update($input);

       notify()->flash('<h2> Great! Your Profile Hasbeen Updated </h2>','success',['timer'=>2500]);

       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);

        $user->delete();
     notify()->flash('<h2> You Have Just Deleted a User </h2>','success',['timer'=>2500]);
        return back();
    }
}
