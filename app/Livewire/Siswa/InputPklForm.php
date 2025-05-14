<?php


namespace App\Livewire\Siswa;


use Livewire\Component;
use App\Models\Pkl;
use App\Models\Siswa;
use App\Models\Industri;
use App\Models\Guru;


class InputPklForm extends Component
{
    public $siswa_id;
    public $industri_id;
    public $guru_id;
    public $tanggal_mulai;
    public $tanggal_selesai;


    protected $rules = [
        'siswa_id' => 'required|exists:siswas,id',
        'industri_id' => 'required|exists:industris,id',
        'guru_id' => 'required|exists:gurus,id',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:mulai',
    ];


    public function submit()
    {
        $this->validate();


        Pkl::create([
            'siswa_id' => $this->siswa_id,
            'industri_id' => $this->industri_id,
            'guru_id' => $this->guru_id,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
        ]);


        session()->flash('message', 'Data PKL berhasil ditambahkan.');
        return redirect()->route('dashboard');
    }


    public function render()
    {
            $siswas = Siswa::all();
            $industris = Industri::all();
            $gurus = Guru::all();

        return view('livewire.siswa.input-pkl-form', compact('siswas', 'industris', 'gurus'))->layout('layouts.app');
    }
}
