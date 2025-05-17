<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Industri;
use Livewire\WithPagination;

class DaftarIndustri extends Component
{
    use WithPagination;

    public $search = '';
    public $numpage = 10;

    public function updatingSearch()
    {
        $this->resetPage(); // Reset ke halaman 1 saat keyword berubah
    }

    public function render()
    {
        $searchTerm = '%' . $this->search . '%';

        $industris = Industri::query()
            ->when($this->search, function ($query) use ($searchTerm) {
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('nama', 'like', $searchTerm)
                      ->orWhere('bidang_usaha', 'like', $searchTerm)
                      ->orWhere('alamat', 'like', $searchTerm)
                      ->orWhere('kontak', 'like', $searchTerm)
                      ->orWhere('email', 'like', $searchTerm);
                });
            })
            ->paginate($this->numpage);

        return view('livewire.siswa.daftar-industri', compact('industris'))
            ->layout('layouts.app');
    }
}
