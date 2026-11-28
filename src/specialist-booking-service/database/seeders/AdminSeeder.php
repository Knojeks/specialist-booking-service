<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $email = config('admin.email');
        $password = config('admin.password');

        if (! is_string($email) || ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new RuntimeException('Укажите корректный ADMIN_EMAIL в .env.');
        }

        $user = User::query()->where('email', $email)->first();

        if ($user !== null) {
            if (! $user->is_admin) {
                throw new RuntimeException(
                    'Этот email уже принадлежит пациенту. Выберите другой ADMIN_EMAIL.',
                );
            }

            return;
        }

        if (! is_string($password) || strlen($password) < 8) {
            throw new RuntimeException(
                'Укажите ADMIN_PASSWORD длиной не менее восьми символов.',
            );
        }

        $user = new User;
        $user->name = 'Администратор';
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->is_admin = true;
        $user->save();
    }
}
