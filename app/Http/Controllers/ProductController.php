<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Product;
use Yajra\DataTables\Facades\Datatables;



class ProductController extends Controller
{
    public function product()
    {
        $product = Product::all();
        return view('product.product', compact('product'));
    }

    public function dashboard()
    {

        return view('dashboard');
    }


    public function create()
    {

        return view('product.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());


        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $products = new Product;
        $products->name = $request->name;

        $products->image = $imageName;
        $products->description = $request->description;

        $products->save();

        // $data = [
        //     'name' => $request->name,

        //     'description' => $request->description,

        // ];

        // $pdf = PDF::loadView('pdf.generatePdf2', compact('data'));

        // $pdf->save(public_path('pdfs/product_information.pdf'));

        return redirect()->route('product')->withSuccess('New Product Submited !!!');
    }

    public function edit($id)
    {

        $product = Product::where('id', $id)->first();
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {

        $products = Product::where('id', $id)->first();

        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $products->image = $imageName;
        }

        $products->name = $request->name;

        $products->description = $request->description;

        $products->update();
        return redirect('/product')->withSuccess('Product Updated !!!');
    }

    public function delete($id)
    {
        $products = Product::where('id', $id)->first();
        $products->delete();
        return redirect('/product')->withSuccess('Product Deleted !!!');
    }
    public function exportProduct()
    {

        $delimiter = ",";
        $filename = "product-data_" . date('d-m-Y') . ".csv";

        $f = fopen('php://memory', 'w');


        $fields = array('ID', 'FIRST NAME', 'DESCRIPTION','IMAGE');
        fputcsv($f, $fields, $delimiter);

        $query = Product::all();;
        foreach ($query as $row) {
                $lineData = array($row['id'], $row['name'], $row['description'], $row['image']);
                fputcsv($f, $lineData, $delimiter);
            }

        fseek($f, 0);

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');

        fpassthru($f);
    }
    public function downloadPdf3() {
        $products = Product::all();
        $data['products'] = $products;
        $pdf = Pdf::loadView('pdf.generatePdf3',$data);
        return $pdf->download('product.pdf');
    }


    public function productDatatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/product/edit'.$row["id"].'" class="edit btn btn-outline-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="/product/delete/'.$row["id"].'" class="delete btn btn-outline-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                    return $actionBtn;
                })
                ->addColumn('checkbox', function($row){
                $checkbox =  '<input type="checkbox" value="'.$row["id"].'" class="record-checkbox" name="record_ids[]">';
                return $checkbox;

            })
            ->rawColumns(['checkbox','action'])
            ->make(true);
            return view('product.product');
            }

    }
    public function deleteMultiple(Request $request)
    {
        $recordIds = $request->input('record_ids');


        Product::where('id', $recordIds)->delete();

        return redirect()->back()->with('success', 'Selected records deleted successfully.');
    }

}
