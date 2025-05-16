<?php


namespace App\Livewire;


use Livewire\Component;
use App\Models\Guru;


class DaftarGuru extends Component
{
    public function render()
    {
        return view('livewire.daftar-guru', [
            'gurus' => Guru::all()
        ])->layout('layouts.app');
    }
}
