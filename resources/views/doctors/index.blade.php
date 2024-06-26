<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Doctor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="{{ route('doctors.create') }}"> <i class="fa-solid fa-plus"></i> Add Doctor</a>
                    </div>
                    <hr>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        @if(session('success'))
                        <div class="alert alert-success fixed top-0 left-1/2 transform -translate-x-1/2 mt-4 p-4 bg-green-500 text-white rounded" role="alert"> 
                            {{ session('success') }} 
                        </div>
                        @endif
                        <table class="table-auto w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-200 text-gray-700">
                                    <th class="border p-2">Action</th>
                                    <th class="border p-2">Doctor Name</th>
                                    <th class="border p-2">Schedules</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($doctors as $doctor)
                                <tr class="bg-white border-b text-gray-700">
                                    <td class="p-2 text-center">
                                        <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="p-2 text-center">{{ $doctor->name }}</td>
                                    <td class="p-2 text-center">
                                        @foreach($doctor->schedules as $schedule)
                                            <div class="calendar-date mb-2">
                                                <div class="date">{{ \Carbon\Carbon::parse($schedule->start_time)->format('d M Y') }}</div>
                                                <div class="time">{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i A') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i A') }}</div>
                                            </div>
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    .calendar-date {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #f0f4f8;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        width: 100%;
        margin: 0 auto;
    }

    .calendar-date .date {
        font-size: 1.2em;
        font-weight: bold;
        margin-bottom: 4px;
    }

    .calendar-date .time {
        font-size: 1em;
        color: #3b82f6; /* Blue text */
    }

    .calendar-date.mb-2 {
        margin-bottom: 8px;
    }

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
