<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppointmentSlot;
use App\Models\Doctor;
use Carbon\CarbonImmutable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AppointmentSlotController extends Controller
{
    public function create(Doctor $doctor): View
    {
        return view('admin.appointment-slots.create', [
            'doctor' => $doctor,
        ]);
    }

    public function store(Request $request, Doctor $doctor): RedirectResponse
    {
        $data = $request->validate([
            'starts_at' => ['required', 'string', 'max:16', 'date_format:Y-m-d\TH:i'],
        ]);

        $startsAt = CarbonImmutable::createFromFormat(
            '!Y-m-d\TH:i',
            $data['starts_at'],
            'Europe/Saratov',
        )->utc();

        $endsAt = $startsAt->addMinutes(30);

        DB::transaction(function () use ($doctor, $startsAt, $endsAt): void {
            $doctor = Doctor::query()
                ->lockForUpdate()
                ->findOrFail($doctor->id);

            if ($startsAt->lessThanOrEqualTo(CarbonImmutable::now('UTC'))) {
                throw ValidationException::withMessages([
                    'starts_at' => 'Выберите время в будущем.',
                ]);
            }

            $overlaps = AppointmentSlot::query()
                ->where('doctor_id', $doctor->id)
                ->where('starts_at', '<', $endsAt)
                ->where('ends_at', '>', $startsAt)
                ->exists();

            if ($overlaps) {
                throw ValidationException::withMessages([
                    'starts_at' => 'Это время пересекается с другим слотом врача.',
                ]);
            }

            AppointmentSlot::create([
                'doctor_id' => $doctor->id,
                'starts_at' => $startsAt,
                'ends_at' => $endsAt,
            ]);
        });

        return redirect()
            ->route('admin.appointment-slots.create', ['doctor' => $doctor->id])
            ->with('status', 'Слот длительностью 30 минут добавлен.');
    }
}
