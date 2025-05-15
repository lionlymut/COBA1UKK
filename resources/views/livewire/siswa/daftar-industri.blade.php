<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-4">Daftar Industri</h2>

    <div class="bg-white shadow-md rounded-xl p-6 overflow-auto">
        <!-- Search & Tambah Button -->
        <div class="flex justify-between items-center mb-4">
            <input
                type="text"
                wire:model.debounce.300ms="search"
                placeholder="Cari industri atau bidang usaha..."
                class="border border-gray-300 rounded px-3 py-2 w-1/2"
            />

            <a href="{{ route('industri.create') }}" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition">
                Tambah Industri
            </a>
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
                @forelse ($industris as $industri)
                    <tr class="border-t">
                        <td class="p-2">{{ $industri->nama }}</td>
                        <td class="p-2">{{ $industri->bidang_usaha }}</td>
                        <td class="p-2">{{ $industri->alamat }}</td>
                        <td class="p-2">{{ $industri->kontak }}</td>
                        <td class="p-2">{{ $industri->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 p-4">Data tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
