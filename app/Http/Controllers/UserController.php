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
            'email' => 'required',
            'address' => 'required',
            'number' => 'required',
            'password' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->number = $request->number;
        $user->password = $request->password;

        $user->save();
        return redirect('/user')->withSuccess('user Submited !!!');
    }

    public function edit($id){
        $user = User::where('id',$id)->first();
        return view('user/edit',compact('user'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'number' => 'required',
            // 'password' => 'required',
        ]);

        $user = User::where('id',$id)->first();



        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->number = $request->number;
        // $user->password = $request->password;

        $user->update();
        return redirect('/user')->withSuccess('user Updated !!!');
    }

    public function delete($id){
        $user = User::where('id',$id)->first();
        $user->delete();
        return redirect('/user')->withSuccess('user Deleted !!!');
    }

}
