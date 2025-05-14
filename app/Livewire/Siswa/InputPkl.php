<?php


namespace App\Livewire\Siswa;
// aku tambahin siswa karena disamping folder ada siswanya


use Livewire\Component;
use App\Models\Pkl;


class InputPkl extends Component
{
    public function render()
    {
        $pkls = pkl::all();
        return view('livewire.siswa.input-pkl', compact('pkls'))->layout('layouts.app');
        // return view('livewire.siswa.input-pkl', [
        //     'pkls' => Pkl::all()
        // ])->layout('layouts.app');
    }
}
