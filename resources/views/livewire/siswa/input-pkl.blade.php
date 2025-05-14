<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-4">Daftar PKL</h2>

    <!-- Tabel daftar PKL -->
    <div class="bg-white shadow-md rounded-xl p-6 overflow-auto">
        <table class="w-full text-left table-auto border-separate border-spacing-y-2">
              <div class="d-flex justify-content-between mb-4">
                        <!-- Tombol untuk menambah industri -->
                        <a href="{{ route('pkl.create') }}" class="bg-blue-500 text-white p-2 rounded">Input Data PKL</a>
                    </div>
    
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


