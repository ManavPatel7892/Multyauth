<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\Datatables;

class UserController extends Controller
{
    public function user()
    {
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

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $randomNumber = rand();
        $min = 1;
        $max = 500;
        $randomNumber = random_int($min, $max);
        $pdfName = 'pdfs/'.$randomNumber.'user_information.pdf';
        $storeInDatabase = asset($pdfName);
        // print_r($storeInDatabase);exit;
        $user = new User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->role = $request->role;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->image = $imageName;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->pdf = $storeInDatabase;
        $user->save();

        $date_of_birth = date_create($request->date_of_birth);
        $bod = date_format($date_of_birth, "d-M-Y");
        $data = [
            'name' => $request->name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'date_of_birth' => $bod,
            'email' => $request->email,
        ];
        // return redirect('/user')->withSuccess('New User Submited !!!');

        $pdf = PDF::loadView('pdf.generatePdf2', compact('data'));
        $pdf->save(public_path($pdfName));

        return redirect()->route('user')->withSuccess('User Added Successfully');
    }

    public function edit($id)
    {

        $user = User::where('id', $id)->first();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {

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

    public function downloadPdf()
    {
        $users = User::where('role', '=', 'user')->get();
        $data['users'] = $users;
        $pdf = Pdf::loadView('pdf.generatePdf', $data);
        // return $pdf->stream('users.pdf');
        return $pdf->download('users.pdf');
    }


    public function userDatatable(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('role', '=', 'user')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/user/edit/'.$row["id"].'" class="edit btn btn-outline-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="/user/delete/'.$row["id"].'" class="delete btn btn-outline-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    <a href="'.$row["pdf"].'" target="_blank" class="btn btn-outline-warning"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('user.user');
    }
}
