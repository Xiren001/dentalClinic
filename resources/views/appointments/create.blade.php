@extends('layouts.main')
@section('content')
<div class="main-container" style="width:100%; padding:0 8rem">
    <div class="intro-container" style="height: 100vh; width:auto">
        <div class="invi-div" style="width:100%; height:100px"></div>
        <div class="">

            <form method="POST" action="{{ route('appointments.store') }}">
                @csrf
                @if(session('success'))
                <div class="alert alert-success fixed top-0 left-1/2 transform -translate-x-1/2 mt-4 p-4 bg-green-500 text-white rounded" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <div hidden class="patient-input">
                    <label for="patient_name">Name</label>
                    <input type="text" id="patient_name" name="patient_name" required value="{{ Auth::user()->name }}">
                </div>
                <div class="calendar-container">
                    <div class="calendar-header">
                        <span class="calendar-header-text">Available Schedules</span>
                    </div>
                    <div class="calendar-body">
                        @foreach($schedules as $schedule)
                        <div class="calendar-item">
                            <div class="calendar-item-header @if($schedule->is_booked) disabled @endif">
                                <span class="doctor-name">{{ $schedule->doctor->name }}</span>
                            </div>
                            <div class="calendar-item-content @if($schedule->is_booked) disabled @endif">
                                <div class="schedule-date">{{ \Carbon\Carbon::parse($schedule->start_time)->isoFormat('MMM DD, YYYY') }}</div>
                                <div class="schedule-time">{{ \Carbon\Carbon::parse($schedule->start_time)->format('h:m A') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:m A') }}</div>
                                <button type="button" class="select-schedule-btn @if($schedule->is_booked) disabled @endif" data-schedule-id="{{ $schedule->id }}" @if($schedule->is_booked) disabled @endif>
                                    Select
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <input type="hidden" name="schedule_id" id="schedule_id" required>
                <div class="btn-div">
                    <button class="book-appointment-container" type="submit">Book Appointment</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .calendar-container {
        border: 1px solid #ccc;
        border-radius: 8px;
        overflow: hidden;
        width: auto;
        margin: 0 auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form {
        width: auto;
    }

    .calendar-header {
        background-color: #0A7F9C;
        color: white;
        padding: 10px;
        text-align: center;
        font-size: 1.25rem;
    }

    .calendar-header-text {
        font-weight: bold;
    }

    .calendar-body {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        grid-auto-rows: minmax(100px, auto);
        gap: 20px;
        padding: 20px;
        grid-auto-flow: row;
        width: auto;
    }

    .calendar-item {
        border: 1px solid #ccc;
        border-radius: 8px;
        overflow: hidden;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .calendar-item-header {
        background-color: #17a8cc;
        color: white;
        padding: 10px;
        text-align: center;
        font-size: 1rem;
    }

    .calendar-item-header.disabled {
        background-color: #555;

    }

    .calendar-item-header.selected {
        background-color: #e85733;

    }

    .doctor-name {
        font-weight: bold;
    }

    .calendar-item-content {
        padding: 10px;
    }

    .calendar-item-content.disabled {
        background-color: #f0f0f0;
        cursor: not-allowed;
        pointer-events: none;
    }

    .schedule-date {
        font-size: 1rem;
        font-weight: bold;
        color: #555;
    }

    .schedule-time {
        font-size: 0.875rem;
        color: #555;
    }

    .select-schedule-btn {
        display: block;
        width: 100%;
        padding: 8px;
        margin-top: 10px;
        background-color: #0A7F9C;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .select-schedule-btn.disabled {
        background-color: #555;
        cursor: not-allowed;
    }

    .select-schedule-btn.selected {
        background-color: #e85733;
    }

    .select-schedule-btn:hover {
        background-color: #e85733;
    }

    .patient-input {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .patient-input label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .patient-input input[type=text] {
        padding: 8px;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn-div {
        padding: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .book-appointment-container {
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        background: #0A7F9C;
        box-shadow: 0px 0px 4px 0px rgba(255, 255, 255, 0.25);
        width: 14.375rem;
        height: 3.25rem;
        text-align: center;
        font-size: 1rem;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        color: white;
        transition: all 0.2s ease-in-out;
    }

    .book-appointment-container:hover {
        background: #17a8cc;
    }

    .alert {
        position: fixed;
        top: 90%;
        left: 50%;
        transform: translateX(-50%);
        margin-top: 1rem;
        padding: 1rem;
        background-color: #68D391;
        /* Change this to your desired background color */
        color: #FFF;
        /* Change this to your desired text color */
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 9999;
        /* Ensure it's on top of everything */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectScheduleButtons = document.querySelectorAll('.select-schedule-btn');
        var selectScheduleHeader = document.querySelectorAll('.calendar-item-header');
        var scheduleIdInput = document.getElementById('schedule_id');

        // Event listener for selecting a schedule
        selectScheduleButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                if (!this.disabled) {
                    var scheduleId = this.getAttribute('data-schedule-id');
                    scheduleIdInput.value = scheduleId;

                    // Toggle selected class for buttons
                    selectScheduleButtons.forEach(function(btn) {
                        btn.classList.remove('selected');
                        btn.textContent = 'Select';
                    });
                    this.classList.add('selected');
                    this.textContent = 'Selected';

                    // Toggle selected class for headers
                    selectScheduleHeader.forEach(function(header) {
                        header.classList.remove('selected');
                    });
                    var header = this.closest('.calendar-item').querySelector('.calendar-item-header');
                    header.classList.add('selected');
                }
            });
        });

    });
</script>

@endsection