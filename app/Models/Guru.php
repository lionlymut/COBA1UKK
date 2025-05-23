<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Guru extends Model
{
    protected $fillable = ['nama', 'nip', 'gender','keterangan', 'alamat', 'kontak', 'email'];

public function pkl()
    {
        return $this->hasMany(Pkl::class);
    }

}
