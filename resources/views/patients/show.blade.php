<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Patient') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-8">
                        <div class="bg-white dark:bg-gray-700 shadow-md rounded-lg p-6">
                            <h2 class="text-2xl font-bold mb-4">Show Patient</h2>
                            <div class="flex flex-wrap mb-6">
                                <div class="w-full md:w-1/3 p-2">
                                    <div class="flex flex-col items-center">
                                        <div class="mb-4">
                                            <img src="/images/{{ $patient->image }}" class="rounded-lg shadow-md" style="width: 340px; height: 240px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full md:w-2/3 p-2">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="mb-4">
                                            <strong>First Name</strong>
                                            <p class="text-gray-600">{{ $patient->firstname }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <strong>Middle Name</strong>
                                            <p class="text-gray-600">{{ $patient->middlename }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <strong>Last Name</strong>
                                            <p class="text-gray-600">{{ $patient->lastname }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <strong>Address</strong>
                                            <p class="text-gray-600">{{ $patient->address }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <strong>Suffix</strong>
                                            <p class="text-gray-600">{{ $patient->suffix }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <strong>Age</strong>
                                            <p class="text-gray-600">{{ $patient->age }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <strong>Gender</strong>
                                            <p class="text-gray-600">{{ $patient->gender }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <strong>Contact Number</strong>
                                            <p class="text-gray-600">{{ $patient->contact_number }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <a href="{{ route('patients.index') }}" class="bg-blue-500 text-black py-2 px-4 rounded hover:bg-blue-700">
                                   <span>Back</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
