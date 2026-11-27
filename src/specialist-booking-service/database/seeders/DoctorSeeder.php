<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $doctors = [
            ['name' => 'Анна Смирнова', 'specialty' => 'Терапевт'],
            ['name' => 'Иван Петров', 'specialty' => 'Кардиолог'],
            ['name' => 'Мария Иванова', 'specialty' => 'Невролог'],
            ['name' => 'Надежда Васина', 'specialty' => 'Терапевт'],
            ['name' => 'Николай Васин', 'specialty' => 'Хирург'],
            ['name' => 'Андрей Аксенов', 'specialty' => 'Офтальмолог'],
            ['name' => 'Ольга Андреева', 'specialty' => 'Отоларинголог'],
            ['name' => 'Сергей Андреев', 'specialty' => 'Эндокринолог'],
            ['name' => 'Екатерина Анисимова', 'specialty' => 'Гинеколог'],
            ['name' => 'Дмитрий Анисимов', 'specialty' => 'Уролог'],
        ];

        foreach ($doctors as $data) {
            Doctor::query()->updateOrCreate(
                ['name' => $data['name']],
                ['specialty' => $data['specialty']],
            );
        }
    }
}
