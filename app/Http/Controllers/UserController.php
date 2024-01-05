<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    public function user()
    {
        // $user = Auth::user();


        // $users = User::where('id', $user->id)->first();


        $users = User::where('role', '=', 'user')->get();
        return view('user.user', compact('users'));
    }

    public function dashboard()
    {

        return view('dashboard');
    }

    public function create()
    {

        return view('user.create');
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

        $date_of_birth = date_create($request->date_of_birth);
        $bod = date_format($date_of_birth,"d-M-Y");
        $data = [
            'name' => $request->name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'date_of_birth' => $bod,
            'email' => $request->email,
        ];
        // return redirect('/user')->withSuccess('New User Submited !!!');

        $pdf = PDF::loadView('pdf.generatePdf2', compact('data'));

        $pdf->save(public_path('pdfs/user_information.pdf'));

        return redirect()->route('user')->withSuccess('New User Submited !!!');
    }

    public function edit($id)
    {

        $user = User::where('id', $id)->first();
        return view('user.edit', compact('user'));
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

    public function downloadPdf() {
        $users = User::where('role', '=', 'user')->get();
        $data['users'] = $users;
        $pdf = Pdf::loadView('pdf.generatePdf',$data);
        // return $pdf->stream('users.pdf');
        return $pdf->download('users.pdf');
    }
}
