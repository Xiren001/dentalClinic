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
                    @if (session('success'))
                    <div>{{ session('success') }}</div>
                    @endif
                    <form method="POST" action="{{ route('appointments.store') }}">
                        @csrf
                        <div>
                            <label>Schedule:</label>
                            <select name="schedule_id" required>
                                @foreach($schedules as $schedule)
                                <option value="{{ $schedule->id }}">
                                    {{ $schedule->doctor->name }}: {{ $schedule->start_time }} - {{ $schedule->end_time }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Patient Name:</label>
                            <input type="text" name="patient_name" required>
                        </div>
                        <button type="submit">Book Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>