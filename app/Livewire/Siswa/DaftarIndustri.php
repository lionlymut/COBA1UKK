<?php


namespace App\Livewire\Siswa;


use Livewire\Component;
use App\Models\Industri;


class DaftarIndustri extends Component
{
     public $search = '';

   public function render()
{
    $industris = Industri::query()
        ->where('nama', 'like', '%' . $this->search . '%')
        ->orWhere('bidang_usaha', 'like', '%' . $this->search . '%')
        ->orderBy('nama')
        ->get();

    return view('livewire.siswa.daftar-industri', [
        'industris' => $industris,
    ])->layout('layouts.app');

    }
}
