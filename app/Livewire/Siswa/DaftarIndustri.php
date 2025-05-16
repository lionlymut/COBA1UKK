<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Industri;

class DaftarIndustri extends Component
{
    public $industris;

    public function mount()
    {
        // Ambil semua data dari tabel industris
        $this->industris = Industri::all();
    }

    public function render()
    {
        return view('livewire.siswa.daftar-industri')->layout('layouts.app');
    }
}

