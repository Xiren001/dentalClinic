<?php
  
namespace App\Http\Controllers;
  
use App\Models\Patient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
  
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return response()
     */
    public function index(): View
    {
        $patients = Patient::latest()->paginate(100);
        $patientCount = Patient::count(); // Count the total number of records

        $patientMCount = Patient::select('gender')
        ->get()
        ->groupBy('gender')
        ->map(function ($gender) {
            return $gender->count();
        });
        $patientFCount = Patient::select('gender')
        ->get()
        ->groupBy('gender')
        ->map(function ($gender) {
            return $gender->count();
        });
    

        
        return view('patients.index',compact('patients', 'patientCount','patientMCount','patientFCount'))
                    ->with('i', (request()->input('page', 1) - 1) * 100);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('patients.create');
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
      
        Patient::create($input);
       
        return redirect()->route('patients.index')
                         ->with('success', 'patient created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Patient $patient): View
    {
        return view('patients.show', compact('patient'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient): View
    {
        return view('patients.edit', compact('patient'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient): RedirectResponse
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
            
        $patient->update($input);
      
        return redirect()->route('patients.index')
                         ->with('success', 'patient updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient): RedirectResponse
    {
        $patient->delete();
         
        return redirect()->route('patients.index')
                         ->with('success', 'patient deleted successfully');
    }
}