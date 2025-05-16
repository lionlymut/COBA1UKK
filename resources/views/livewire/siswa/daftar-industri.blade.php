<div class="mx-auto p-6 max-w-6xl">
    <h2 class="text-2xl font-semibold mb-4">Daftar Industri</h2>

    <!-- Card Container -->
    <div class="bg-white shadow-lg rounded-xl p-6">
        
        <!-- Tombol Aksi -->
        <div class="mb-4">
            <a href="{{ route('industri.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition">
                Tambah Industri
            </a>
        </div>

        <!-- Tabel Industri -->
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-separate border-spacing-y-2">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 text-left">Nama Industri</th>
                        <th class="p-2 text-left">Bidang Usaha</th>
                        <th class="p-2 text-left">Alamat</th>
                        <th class="p-2 text-left">Kontak</th>
                        <th class="p-2 text-left">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($industris as $industri)
                        <tr class="bg-white hover:bg-gray-50 shadow-sm rounded">
                            <td class="p-2">{{ $industri->nama }}</td>
                            <td class="p-2">{{ $industri->bidang_usaha }}</td>
                            <td class="p-2">{{ $industri->alamat }}</td>
                            <td class="p-2">{{ $industri->kontak }}</td>
                            <td class="p-2">{{ $industri->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
