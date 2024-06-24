<?php
  
namespace App\Http\Controllers;
  
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
  
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return response()
     */
    public function index(): View
    {
        $employees = Employee::latest()->paginate(100);
        $employeeCount = Employee::count(); // Count the total number of records

        $employeeMCount = Employee::select('gender')
        ->get()
        ->groupBy('gender')
        ->map(function ($gender) {
            return $gender->count();
        });
        $employeeFCount = Employee::select('gender')
        ->get()
        ->groupBy('gender')
        ->map(function ($gender) {
            return $gender->count();
        });
    

        
        return view('employees.index',compact('employees', 'employeeCount','employeeMCount','employeeFCount'))
                    ->with('i', (request()->input('page', 1) - 1) * 100);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('employees.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname' => 'required',
    'middlename' => 'required',
    'lastname' => 'required',
    'address' => 'required',
    'suffix' => 'required',
  
    'age' => 'required|integer',
    'gender' => 'required',
    
    'contact_number' => 'required',
  
    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $input = $request->all();
    
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
      
        Employee::create($input);
       
        return redirect()->route('employees.index')
                         ->with('success', 'employee created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Employee $employee): View
    {
        return view('employees.show', compact('employee'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee): View
    {
        return view('employees.edit', compact('employee'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee): RedirectResponse
    {
        $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'suffix' => 'required',
           
            'age' => 'required|integer',
            'gender' => 'required',
            
            'contact_number' => 'required',
          
    
        ]);
    
        $input = $request->all();
    
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
            
        $employee->update($input);
      
        return redirect()->route('employees.index')
                         ->with('success', 'employee updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();
         
        return redirect()->route('employees.index')
                         ->with('success', 'employee deleted successfully');
    }
}