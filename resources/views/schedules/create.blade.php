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
                    <form method="POST" action="{{ route('schedules.store') }}" class="space-y-6">
                        @csrf
                        <div class="mb-4">
                            <label for="doctor_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Doctor:</label>
                            <select name="doctor_id" id="doctor_id" required class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-row w-full gap-2">
                        <div class="mb-4 w-full">
                            <label for="start_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Time:</label>
                            <input type="datetime-local" name="start_time" id="start_time" required class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div class="mb-4 w-full">
                            <label for="end_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Time:</label>
                            <input type="datetime-local" name="end_time" id="end_time" required class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="custom-button">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-button {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            background-color: #4f46e5; /* bg-indigo-600 */
            border: none;
            border-radius: 0.375rem; /* rounded-md */
            font-weight: 600; /* font-semibold */
            font-size: 0.75rem; /* text-xs */
            color: #ffffff; /* text-black */
            text-transform: uppercase;
            letter-spacing: 0.05em; /* tracking-widest */
            transition: background-color 0.3s ease-in-out;
        }

        .custom-button:hover {
            background-color: #4338ca; /* hover:bg-indigo-500 */
        }

        .custom-button:focus {
            outline: none;
            border-color: #3730a3; /* focus:border-indigo-700 */
            box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25); /* focus:ring-indigo-200 */
        }

        .custom-button:active {
            background-color: #4f46e5; /* active:bg-indigo-600 */
        }
    </style>
</x-app-layout>
