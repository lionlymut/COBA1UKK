<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-4">Daftar Industri</h2>

    <!-- Tabel daftar Industri -->
    <div class="bg-white shadow-md rounded-xl p-6 overflow-auto">
        
        <div class="flex justify-between mb-4">
            <!-- Tombol untuk menambah industri -->
            <a href="{{ route('industri.create') }}" class="bg-blue-500 text-white p-2 rounded">Tambah Industri</a>
        </div>

        <table class="w-full text-left table-auto border-separate border-spacing-y-2">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2">Nama Industri</th>
                    <th class="p-2">Bidang Usaha</th>
                    <th class="p-2">Alamat</th>
                    <th class="p-2">Kontak</th>
                    <th class="p-2">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($industris as $industri)
                    <tr class="border-t">
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
