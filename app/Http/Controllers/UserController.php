<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        $users = User::all();
        return view('user/user', compact('users'));
    }

    public function dashboard(){
        return view('dashboard');
    }


    public function create(){

        return view('user/create');
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            // 'image' => 'required|mimes:png,jpg,jpeg,gif|max:10000',
            'email' => 'required',
            'password' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('userImage'),$imageName);

        $user = new User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        // $user->image = $imageName;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        return redirect('/user')->withSuccess('New User Submited !!!');
    }

    public function edit($id){
        $user = User::where('id',$id)->first();
        return view('user/edit',compact('user'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            // 'image' => 'required',
            'email' => 'required',
            // 'password' => 'required',
        ]);

        $user = User::where('id',$id)->first();

        // if(isset($request->image)){
        //     $imageName = time().'.'.$request->image->extension();
        //     $request->image->move(public_path('userImage'),$imageName);
        //     $user->image = $imageName;
        // }

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->email = $request->email;

        $user->update();
        return redirect('/user')->withSuccess('user Updated !!!');
    }

    public function delete($id){
        $user = User::where('id',$id)->first();
        $user->delete();
        return redirect('/user')->withSuccess('user Deleted !!!');
    }

}
