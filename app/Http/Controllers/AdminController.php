<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $user_id = Auth::user()->id;
        $users = User::where('id', $user_id)->get();
        $userrole = $users[0]['role'];
        $admin = User::where('role', '=', 'admin')->get();
        return view('admin/admin', compact('admin', 'userrole'));
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
        return view('admin/create', compact('userrole'));
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
        return redirect('/admin')->withSuccess('New Admin Submited !!!');
    }

    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $users = User::where('id', $user_id)->get();
        $userrole = $users[0]['role'];
        $user = User::where('id', $id)->first();
        return view('admin/edit', compact('user', 'userrole'));
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
        return redirect('/admin')->withSuccess('Admin Updated !!!');
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect('/admin')->withSuccess('Admin Deleted !!!');
    }
    public function exportAdmin()
    {

        // Excel file name for download
        $fileName = "admin-data_" . date('d-m-Y') . ".csv";

        // Column names
        $fields = array('ID', 'ROLE', 'FIRST NAME', 'LAST NAME', 'GENDER', 'DOB', 'IMAGE', 'EMAIl', 'PASS');

        // Display column names as first row
        $excelData = implode("\t", array_values($fields)) . "\n";

        // Fetch records from database
        $query = User::where('role', '=', 'admin')->get();
        // echo $query;exit;
        foreach ($query as $row) {
            $lineData = array($row['id'], $row['role'], $row['name'], $row['last_name'], $row['gender'], $row['date_of_birth'], $row['image'], $row['email'], $row['password']);
            // array_walk($lineData, 'filterData');
            $excelData .= implode("\t", array_values($lineData)) . "\n";
        }


        // Headers for download
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");

        // Render excel data
        echo $excelData;
    }
}
