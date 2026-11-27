<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\View\View;

class DoctorScheduleController extends Controller
{
    public function show(Doctor $doctor): View
    {
        return view('doctors.schedule', [
            'doctor' => $doctor,
        ]);
    }
}
