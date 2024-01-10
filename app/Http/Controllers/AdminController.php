<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\Datatables;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function admin()
    {
        $admin = User::where('role', '=', 'admin')->get();
        return view('admin/admin', compact('admin'));
    }

    public function dashboard()
    {

        return view('dashboard');
    }


    public function create()
    {

        return view('admin.create');
    }

    public function store(Request $request)
    {


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
        // return redirect('/admin')->withSuccess('New Admin Submited !!!');
        $date_of_birth = date_create($request->date_of_birth);
        $bod = date_format($date_of_birth,"d-M-Y");
        $data = [
            'name' => $request->name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'date_of_birth' => $bod,
            'email' => $request->email,
        ];
        $pdf = PDF::loadView('pdf.generatePdf2', compact('data'));

        $pdf->save(public_path('pdfs/admin_information.pdf'));

        return redirect()->route('admin')->withSuccess('New Admin Submited !!!');
    }

    public function edit($id)
    {

        $user = User::where('id', $id)->first();
        return view('admin.edit', compact('user'));
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

        $delimiter = ",";
        $filename = "admin-data_" . date('d-m-Y') . ".csv";

        $f = fopen('php://memory', 'w');


        $fields = array('ID', 'ROLE', 'FIRST NAME', 'LAST NAME', 'GENDER', 'DOB', 'IMAGE', 'EMAIl', 'PASS');
        fputcsv($f, $fields, $delimiter);

        $query = User::where('role', '=', 'admin')->get();;
        foreach ($query as $row) {
                $lineData = array($row['id'], $row['role'], $row['name'], $row['last_name'], $row['gender'], $row['date_of_birth'], $row['image'], $row['email'], $row['password']);
                fputcsv($f, $lineData, $delimiter);
            }

        fseek($f, 0);

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');

        fpassthru($f);
    }
    public function downloadPdf2() {
        $users = User::where('role', '=', 'admin')->get();
        $data['users'] = $users;
        $pdf = Pdf::loadView('pdf.generatePdf',$data);
        // return $pdf->stream('users.pdf');
        return $pdf->download('admin.pdf');
    }

    public function adminDatatable(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('role', '=', 'admin')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/admin/edit/'.$row["id"].'" class="edit btn btn-outline-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="/admin/delete/'.$row["id"].'" class="delete btn btn-outline-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.admin');
    }
}
