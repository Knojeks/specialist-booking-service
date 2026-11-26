<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\View\View;

class DoctorController extends Controller
{
    public function index(): View
    {
        $doctors = Doctor::query()->orderBy('name')->get();

        return view('doctors.index', [
            'doctors' => $doctors,
        ]);
    }
}
