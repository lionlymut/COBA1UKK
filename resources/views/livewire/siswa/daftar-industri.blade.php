<div class="bg-white shadow-lg rounded-xl p-6 border border-gray-300 max-w-4xl mx-auto mt-8">
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4 text-center">Daftar Industri</h2>

        <!-- Card container -->
        <div class="bg-white shadow-md rounded-xl p-6">

            <!-- Tombol dan Search di satu baris -->
            <div class="flex justify-between items-center mb-4 gap-4">
                <a href="{{ route('industri.create') }}" class="bg-blue-500 text-white p-2 rounded shadow">
                    Tambah Industri
                </a>
                 <div class="mb-4">
                    <input type="text" wire:model.live.300ms="search" placeholder="Search.." class="border rounded p-2 w-full">
                </div>

                
            </div>

            <!-- Tabel daftar Industri -->
            <div class="overflow-auto">
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
                        @forelse ($industris as $industri)
                            <tr class="bg-white hover:bg-gray-50 shadow-sm rounded">
                                <td class="p-2">{{ $industri->nama }}</td>
                                <td class="p-2">{{ $industri->bidang_usaha }}</td>
                                <td class="p-2">{{ $industri->alamat }}</td>
                                <td class="p-2">{{ $industri->kontak }}</td>
                                <td class="p-2">{{ $industri->email }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center p-4 text-gray-500">Tidak ada data industri ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>