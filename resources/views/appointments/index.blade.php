<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Appointment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700">
                                <th class="border p-2">Patient Name</th>
                                <th class="border p-2">Doctor Name</th>
                                <th class="border p-2">Date</th>
                                <th class="border p-2">Start Time</th>
                                <th class="border p-2">End Time</th>
                                <th class="border p-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                            <tr class="bg-white border-b text-gray-700">
                                <td class="p-2 text-center">{{ $appointment->patient_name }}</td>
                                <td class="p-2 text-center">
                                    {{ $appointment->schedule ? $appointment->schedule->doctor->name : 'N/A' }}
                                </td>
                                <td class="p-2 text-center">
                                    {{ $appointment->schedule ? \Carbon\Carbon::parse($appointment->schedule->start_time)->isoFormat('MMM DD, YYYY') : 'N/A' }}
                                </td>
                                <td class="p-2 text-center">
                                    {{ $appointment->schedule ? \Carbon\Carbon::parse($appointment->schedule->start_time)->format('h:m A') : 'N/A' }}
                                </td>
                                <td class="p-2 text-center">
                                    {{ $appointment->schedule ? \Carbon\Carbon::parse($appointment->schedule->end_time)->format('h:m A') : 'N/A' }}
                                </td>
                                <td class="p-2 text-center">
                                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
