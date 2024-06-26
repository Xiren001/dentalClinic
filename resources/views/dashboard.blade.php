<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="dashboard-box bg-blue-500">
                            <h3>Total Patient</h3>
                            <p class="p">{{$patientCount}}</p>
            
                            <p class="pp">Male - {{$patientMCount}} &nbsp; | &nbsp; Female - {{$patientFCount}}</p>
                        </div>
                        <div class="dashboard-box bg-green-500">
                        <h3>Total Employees</h3>
                            <p class="p">{{$employeeCount}}</p>
                            <p class="pp">Male - {{$employeeMCount}} &nbsp; | &nbsp; Female - {{$employeeFCount}}</p>
                          
                        </div>
                        <div class="dashboard-box bg-yellow-500">
                        <h3>Total Doctors</h3>
                            <p class="p">{{$doctorCount}}</p>
                        </div>
                        <div class="dashboard-box bg-red-500">
                        <h3>Total Schedules</h3>
                            <p class="p">{{$scheduleCount}}</p>
                        </div>
                        <div class="dashboard-box bg-purple-500">
                        <h3>Appointments</h3>
                            <p class="p">{{$appointmentCount}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .p{
            font-size: 2em;
            font-weight: bold;
        }

        .pp{
            font-size: 1em;
            font-weight: bold;
        }
        .dashboard-box {
            background-color: #4a5568; /* Default color if dark theme not supported */
            color: #ffffff;
            padding: 2.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 1.2rem;
            
        }

        .bg-blue-500 {
            background-color: #4299e1;
        }

        .bg-green-500 {
            background-color: #48bb78;
        }

        .bg-yellow-500 {
            background-color: #ecc94b;
        }

        .bg-red-500 {
            background-color: #f56565;
        }

        .bg-purple-500 {
            background-color: #9f7aea;
        }

        @media (prefers-color-scheme: dark) {
            .dashboard-box {
                background-color: #1a202c;
            }
        }
    </style>
</x-app-layout>
