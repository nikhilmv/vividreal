<?php

namespace App\Http\Controllers;

 
 
use App\Models\Employee;
use App\Models\Company; 
use App\Http\Requests\Admin\EmployeeRequest;  
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use Yajra\DataTables\Html\Builder;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
    
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/employee/index');
    }

    public function getEmployeeData()
    {
  
        $data = Employee::orderBy('id','DESC');
        return Datatables::of($data)
                ->addIndexColumn()
             
                ->editColumn('employee_name',function($row){
                    return $row->first_name." ".$row->last_name;
                })        ->editColumn('email',function($row){
                    return $row->email;
                })        ->editColumn('company',function($row){
                    return $row->company->name;
                })         ->editColumn('phone',function($row){
                    return $row->phone;
                }) 
                ->addColumn('action', function ($row) {
                    $buttons = ""; 
                     
                        $buttons .='<button type="button" class="btn btn-icon btn-info btn-sm" title="Edit" onclick="window.location.href=\''. route('admin.employee.edit', $row->id) .'\'">edit </button> ';
                    
                        $buttons .='<button type="button" class="btn btn-icon btn-danger btn-sm" title="Delete" data-toggle="modal" data-target="#danger-alert-modal" onclick="deleteForm(\'delete-form'.$row->id.'\')">delete </button><form id="delete-form'.$row->id.'" method="post" action="'.route("admin.employee.destroy", $row->id).'"><input type="hidden" name="_method" value="delete"><input type="hidden" name="_token"  value="'.csrf_token().'"></form>';
                    
                   
                    return $buttons;
                })
                ->rawColumns(['action'])
                ->make(true);
     
    return view('admin/employee/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $company = Company::all();
        return view('admin.employee.create',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    { 
        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company;
        $employee->email = $request->email;
        $employee->phone = $request->phone; 
        $employee->save();
  
        return redirect()->route('admin.employee.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Employee::where('id', $id )->first();
        $company = Company::all(); 
        return view('admin.employee.edit', compact('company', 'data'));
    }

  

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request)
    { 
 
        $employee = Employee::find($request->id); 
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company;
        $employee->email = $request->email;
        $employee->phone = $request->phone;  
        $employee->save();
 

        return redirect()->route('admin.employee.index')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the external image.
    */
    public function removeImage($id)
    {
        $product = ProductImage::where('id', $id)->first();
        $image_path = public_path('product-slider-images/' . $product->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $product->delete();
        return redirect()->back()->with('warning', 'Product image removed successfully.');
    }

    /**
     * Remove the specified resource from storage.
    */ 

    public function destroy(Employee $employee)
    {
        $employee = Employee::where('id',$employee->id)->first(); 
        $employee->delete();
        return redirect()->route('admin.employee.index')->with('error','Employee deleted successfully.');
    }

}
