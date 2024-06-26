<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-8">
                        <div class="flex justify-between items-center mb-4">
                            <a href="{{ route('employees.create') }}" class="bg-blue-500 text-black py-2 px-4 rounded hover:bg-blue-700">
                            <i class="fa-solid fa-plus"></i> <span>Add Employee</span>
                            </a>
                            <form action="" method="GET" class="w-1/2 flex">
                                <input type="search" name="search" id="search" autocomplete="off" class="form-control w-full border border-gray-300 rounded-l px-4 py-2" placeholder="Search" value="{{ request('search') }}">
                                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-r hover:bg-blue-700">Search</button>
                            </form>
                        </div>

                        @if(session('success'))
                        <div class="alert alert-success fixed top-0 left-1/2 transform -translate-x-1/2 mt-4 p-4 bg-green-500 text-white rounded" role="alert"> 
                            {{ session('success') }} 
                        </div>
                        @endif

                        <table class="table-auto w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-200 text-gray-700">
                                    <th class="border p-2">
                                        <input type="checkbox" id="selectAll" class="form-checkbox h-4 w-4">
                                    </th>
                                    <th class="border p-2">Image</th>
                                    <th class="border p-2">First Name</th>
                                    <th class="border p-2">Middle Name</th>
                                    <th class="border p-2">Last Name</th>
                                    <th class="border p-2">Address</th>
                                    <th class="border p-2">Gender</th>
                                    <th class="border p-2">Contact No</th>
                                    <th class="border p-2 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $employee)
                                <tr class="bg-white border-b text-gray-700">
                                    <td class="p-2 text-center">
                                        <input type="checkbox" id="checkbox1" name="options[]" value="1" class="form-checkbox h-4 w-4">
                                    </td>
                                    <td class="p-2 text-center">
                                        <img src="/images/{{ $employee->image }}" width="50px" height="50px" class="rounded">
                                    </td>
                                    <td class="p-2 text-center">{{ $employee->firstname }}</td>
                                    <td class="p-2 text-center">{{ $employee->middlename }}</td>
                                    <td class="p-2 text-center">{{ $employee->lastname }}</td>
                                    <td class="p-2 text-center">{{ $employee->address }}</td>
                                    <td class="p-2 text-center">{{ $employee->gender }}</td>
                                    <td class="p-2 text-center">{{ $employee->contact_number }}</td>
                                    <td class="p-2 text-center flex justify-center space-x-2">
                                        <a href="{{ route('employees.show',$employee->id) }}" class="bg-blue-500 text-black py-1 px-2 rounded hover:bg-blue-700"><i class="fa-solid fa-list"></i></a>
                                        <a href="{{ route('employees.edit',$employee->id) }}" class="bg-yellow-500 text-black py-1 px-2 rounded hover:bg-yellow-700"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('employees.destroy',$employee->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-black py-1 px-2 rounded hover:bg-red-700"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="p-4 text-center">There are no data.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {!! $employees->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .alert {
        position: fixed;
        top: 90%;
        left: 50%;
        transform: translateX(-50%);
        margin-top: 1rem;
        padding: 1rem;
        background-color: #68D391; /* Change this to your desired background color */
        color: #FFF; /* Change this to your desired text color */
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 9999; /* Ensure it's on top of everything */
    }
    </style>

</x-app-layout>
