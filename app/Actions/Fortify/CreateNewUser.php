<?php

namespace App\Actions\Fortify;

//use statement
use App\Models\User; //untuk pengecekkan dan penyimpana user
use App\Models\Siswa; //untuk pengecekkan dan penyimpana user
use App\Models\Guru; //untuk pengecekkan dan penyimpana user
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;  //untuk memvalidasi 
use Illuminate\Validation\ValidationException; // menolak jika terjadi kesalahan validasi
use Laravel\Fortify\Contracts\CreatesNewUsers;

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

        // Validasi apakah email terdaftar di tabel siswa atau guru
        $email = $input['email'];
        $terdaftarSebagaiSiswa = Siswa::where('email', $email)->exists();
        $terdaftarSebagaiGuru = Guru::where('email', $email)->exists();

        if (!$terdaftarSebagaiSiswa && !$terdaftarSebagaiGuru) {
            throw ValidationException::withMessages([
                'email' => 'Email ini tidak terdaftar.',
            ]);
        }

        // Buat user baru (role null dulu, nanti diatur oleh admin)
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => null,
        ]);
    }
}
