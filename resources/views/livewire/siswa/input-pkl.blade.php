@php
    $user = auth()->user();
@endphp
<div class="bg-white shadow-lg rounded-xl p-6 border border-gray-300 max-w-4xl mx-auto mt-8">
    <div class="container mx-auto p-6">
        <!-- Bagian salam dan info user -->
       
            <h2 class="text-2xl font-semibold mb-4 text-center">Daftar Siswa PKL</h2>
            <h3 class="text-lg font-bold mb-4">Halo, {{ $user->name }}</h3>
            <p>Silakan input data PKL dan Industri:</p>
            {{-- @livewire('siswa.input-pkl') atau lainnya --}}
        
        

        <!-- Tombol dan Search di satu baris -->
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('pkl.create') }}" class="bg-blue-500 text-white p-2 rounded shadow">
                Input Data PKL
            </a>

            <div class="mb-4">
                <input type="text" wire:model.live.300ms="search" placeholder="Search..." class="border rounded p-2 w-full">
            </div>
        </div>

        <!-- Tabel daftar PKL -->
        <div class="bg-white shadow-md rounded-xl p-6 overflow-auto">
            <table class="w-full text-left table-auto border-separate border-spacing-y-2">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2">Nama Siswa</th>
                        <th class="p-2">Industri</th>
                        <th class="p-2">Assesor</th>
                        <th class="p-2">Tanggal Mulai</th>
                        <th class="p-2">Tanggal Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pkls as $pkl)
                        <tr class="border-t">
                            <td class="p-2">{{ $pkl->siswa->nama ?? '-' }}</td>
                            <td class="p-2">{{ $pkl->industri->nama ?? '-' }}</td>
                            <td class="p-2">{{ $pkl->guru->nama ?? '-' }}</td>
                            <td class="p-2">{{ $pkl->tanggal_mulai }}</td>
                            <td class="p-2">{{ $pkl->tanggal_selesai }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>