<?php




namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;




class Siswa extends Authenticatable
{
    protected $fillable = ['nama', 'nis', 'gender', 'alamat', 'kontak', 'email', 'foto', 'status_pkl'];
    protected $hidden = ['password'];
    // Model Siswa.php buat ambil siswa yang udah kirim data biar true
    public function pkl()
    {
        return $this->hasMany(Pkl::class, 'siswa_id', 'id');  // Sesuaikan dengan nama kolom yang ada
    }
   

 // Accessor status_pkl : tukang cek data
 public function getStatusPklAttribute()
 {
     return $this->pkl()->exists();
 } // kalau siswa ada data pkl maka akan di kembalikan ke true, jika tidak maka flase, ini terhubung di SiswaResources

}




