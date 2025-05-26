<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\Industri;
use App\Models\Guru;


class Pkl extends Model
{
    protected $table = 'pkls';

    protected $fillable = ['siswa_id', 'industri_id', 'guru_id', 'tanggal_mulai', 'tanggal_selesai'];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

     // Membuat accessor
    public function getDurasiAttribute()
{
    if ($this->tanggal_mulai && $this->tanggal_selesai) {
        return $this->tanggal_mulai->diffInDays($this->tanggal_selesai);
    }
    return null;  // atau 0, sesuai kebutuhan
}

    // di App\Models\Pkl.php
public function guru()
{
    return $this->belongsTo(Guru::class);
}
public function siswa()
{
    return $this->belongsTo(Siswa::class);
}

public function industri()
{
    return $this->belongsTo(Industri::class);
}
protected static function booted()
{
   
}
}

