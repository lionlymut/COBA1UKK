<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input): User
    {
        // Validasi input dasar
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => $this->passwordRules(),
        ])->validate();

        $email = $input['email'];
        $terdaftarSebagaiSiswa = Siswa::where('email', $email)->exists();
        $terdaftarSebagaiGuru = Guru::where('email', $email)->exists();

        if (!$terdaftarSebagaiSiswa && !$terdaftarSebagaiGuru) {
            throw ValidationException::withMessages([
                'email' => 'Email ini tidak terdaftar.',
            ]);
        }

        // Buat user baru
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        // Jika email terdaftar di siswa => assign role siswa
        if ($terdaftarSebagaiSiswa) {
            $user->assignRole('siswa');
        }

        // (Opsional) Kalau mau, bisa assign role guru kalau emailnya terdaftar di guru
        if ($terdaftarSebagaiGuru) {
             $user->assignRole('guru');
         }

        return $user;
    }
}
