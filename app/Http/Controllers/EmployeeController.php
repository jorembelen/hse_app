<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Imports\EmployeesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Employee;
use App\Models\Incident;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employees = Employee::with('officer')->paginate(10);
        $employees = Employee::paginate(10);

        return view('employees.index', ['employees' => $employees]);
    }

    public function indexImport()
    {
        $employees = Employee::paginate(10);

        return view('employees.import', compact('employees', $employees));
    }

    public function import(Request $request) 
    {
        

        $validator = Excel::import(new EmployeesImport,request()->file('file'));
        
        Alert::success('Success', 'Employees Imported Successfully!');
           
        return redirect('/admin/employees')->with('success', 'Employee Has Been imported Successfully');
    }

    public function search(Request $request)
    {
       
        // $employees = Employee::all();

        $str = $request->input('search');

        $employees = Employee::where('badge', 'LIKE' , '%'.$str.'%')
        ->orWhere('name', 'LIKE' , '%'.$str.'%')
        ->orWhere('designation', 'LIKE' , '%'.$str.'%')->get();

        return view('employees.search_result')
        ->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('officers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStoreRequest $request)
    {
        $officers = Employee::create($request->all());

        Alert::toast('Data Added Successfully!', 'success');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdateRequest $request, $id)
    {

        $employees = Employee::findOrFail($id);

        $employees->update($request->all());

        Alert::toast('Employee Updated Successfully!', 'success');

        return redirect('/admin/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employees = Employee::paginate(10);

        $employee = Employee::findOrFail($id);

        if($employee->incidents()->count()) {
            
            Alert::error('Error', 'Sorry, this employee has an existing notification report!');
            
            return redirect('/admin/employees');
        }
       
        $employee->delete();

        Alert::success('success', 'Data Deleted Successfully!');

        return redirect('/admin/employees');
    }
}
