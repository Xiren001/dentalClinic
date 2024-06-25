<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('schedules.store') }}">
                        @csrf
                        <div>
                            <label>Doctor:</label>
                            <select name="doctor_id" required>
                                @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Start Time:</label>
                            <input type="datetime-local" name="start_time" required>
                        </div>
                        <div>
                            <label>End Time:</label>
                            <input type="datetime-local" name="end_time" required>
                        </div>
                        <button type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>