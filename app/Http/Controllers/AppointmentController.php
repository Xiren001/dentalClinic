<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Schedule;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create()
    {
        $schedules = Schedule::all();
        return view('appointments.create', compact('schedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'patient_name' => 'required|string|max:255',
        ]);

        Appointment::create($request->all());
        return redirect()->route('appointments.create')->with('success', 'Appointment booked successfully.');
    }

    public function index()
    {
        $appointments = Appointment::with(['schedule', 'schedule.doctor'])->get();
        return view('appointments.index', compact('appointments'));
    }
}
