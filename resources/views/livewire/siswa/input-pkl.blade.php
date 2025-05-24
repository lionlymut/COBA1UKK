
<div class="max-w-4xl mx-auto mt-8 bg-white border border-gray-300 rounded-xl shadow-lg p-6">
    <!-- Header salam dan info user -->
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-semibold mb-2">Daftar Siswa PKL</h2>
        <p class="text-gray-600">Silakan input data PKL dan Industri:</p>
        {{-- @livewire('siswa.input-pkl') atau lainnya --}}
    </div>

    <!-- Baris tombol dan search -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <a href="{{ route('pkl.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow transition">
            Daftar Pkl
        </a>

        <input type="text" 
               wire:model.live.300ms="search" 
               placeholder="Search..." 
               class="border border-gray-300 rounded px-4 py-2 w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
    </div>

    <!-- Tabel daftar PKL -->
    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="p-3 text-left font-medium border-b border-gray-300">Nama Siswa</th>
                    <th class="p-3 text-left font-medium border-b border-gray-300">Industri</th>
                    <th class="p-3 text-left font-medium border-b border-gray-300">Assesor</th>
                    <th class="p-3 text-left font-medium border-b border-gray-300">Tanggal Mulai</th>
                    <th class="p-3 text-left font-medium border-b border-gray-300">Tanggal Selesai</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pkls as $pkl)
                    <tr class="border-b last:border-b-0 hover:bg-gray-50 transition">
                        <td class="p-3">{{ $pkl->siswa->nama ?? '-' }}</td>
                        <td class="p-3">{{ $pkl->industri->nama ?? '-' }}</td>
                        <td class="p-3">{{ $pkl->guru->nama ?? '-' }}</td>
                        <td class="p-3">{{ \Carbon\Carbon::parse($pkl->tanggal_mulai)->format('d M Y') }}</td>
                        <td class="p-3">{{ \Carbon\Carbon::parse($pkl->tanggal_selesai)->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-6 text-gray-500">
                            Data PKL tidak ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
