<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function user()
    {
        $user_id = Auth::user()->id;
        $users = User::where('id', $user_id)->get();
        $userrole = $users[0]['role'];
        $users = User::where('role', '=', 'user')->get();
        return view('user/user', compact('users', 'userrole'));
    }

    public function dashboard()
    {
        $user_id = Auth::user()->id;
        $users = User::where('id', $user_id)->get();
        $userrole = $users[0]['role'];
        return view('dashboard', compact('userrole'));
    }

    public function create()
    {
        $user_id = Auth::user()->id;
        $users = User::where('id', $user_id)->get();
        $userrole = $users[0]['role'];
        return view('user/create', compact('userrole'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'role' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,gif|max:10000',
            'email' => 'required',
            'password' => 'required',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $user = new User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->role = $request->role;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->image = $imageName;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        return redirect('/user')->withSuccess('New User Submited !!!');
    }

    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $users = User::where('id', $user_id)->get();
        $userrole = $users[0]['role'];
        $user = User::where('id', $id)->first();
        return view('user/edit', compact('user', 'userrole'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'role' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif|max:10000',
            'email' => 'required',
            // 'password' => 'required',
        ]);

        $user = User::where('id', $id)->first();

        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $user->image = $imageName;
        }

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->role = $request->role;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->email = $request->email;

        $user->update();
        return redirect('/user')->withSuccess('user Updated !!!');
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect('/user')->withSuccess('user Deleted !!!');
    }

    public function exportUser()
    {

        $delimiter = ",";
        $filename = "users-data_" . date('d-m-Y') . ".csv";

        $f = fopen('php://memory', 'w');


        $fields = array('ID', 'ROLE', 'FIRST NAME', 'LAST NAME', 'GENDER', 'DOB', 'IMAGE', 'EMAIl', 'PASS');
        fputcsv($f, $fields, $delimiter);

        $query = User::where('role', '=', 'user')->get();;
        foreach ($query as $row) {
                $lineData = array($row['id'], $row['role'], $row['name'], $row['last_name'], $row['gender'], $row['date_of_birth'], $row['image'], $row['email'], $row['password']);
                fputcsv($f, $lineData, $delimiter);
            }

        fseek($f, 0);

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');

        fpassthru($f);
    }
}
