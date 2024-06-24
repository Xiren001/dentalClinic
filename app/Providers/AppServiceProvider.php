<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Models\Patient;
use App\Models\Employee;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot()
{
   
    $patientCount = Patient::count(); // Assuming Business is another model
    $patientMCount = Patient::where('gender', 'male')->count();
    $patientFCount = Patient::where('gender', 'female')->count();

    $employeeCount = Employee::count(); // Assuming Business is another model
    $employeeMCount = Employee::where('gender', 'male')->count();
    $employeeFCount = Employee::where('gender', 'female')->count();
   
    
    View::share([
    
        'patientCount' => $patientCount,
        'patientMCount' => $patientMCount,
        'patientFCount' => $patientFCount,

        'employeeCount' => $employeeCount,
        'employeeMCount' => $employeeMCount,
        'employeeFCount' => $employeeFCount
        

    ]);
}
}
