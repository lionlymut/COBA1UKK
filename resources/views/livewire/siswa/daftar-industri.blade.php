<div class="max-w-screen-xl mx-auto mt-8 bg-white border border-gray-300 rounded-xl shadow-lg p-6">
    <h2 class="text-2xl font-semibold mb-6 text-center">Daftar Industri</h2>

    <div class="bg-white shadow-md rounded-xl p-6">
        <!-- Tombol & Search -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <a href="{{ route('industri.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow transition">
                Tambah Industri
            </a>

            <input type="text"
                   wire:model.live.300ms="search"
                   placeholder="Search..."
                   class="border border-gray-300 rounded px-4 py-2 md:w-40 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
        </div>

        <!-- Tabel -->
        <div class="border border-gray-300 rounded overflow-x-auto">
            <table class="w-full border-collapse">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="p-3 text-center font-medium border-b">Nama Industri</th>
                        <th class="p-3 text-center font-medium border-b">Bidang Usaha</th>
                        <th class="p-3 text-center font-medium border-b">Alamat</th>
                        <th class="p-3 text-center font-medium border-b">Kontak</th>
                        <th class="p-3 text-center font-medium border-b">Email</th>
                        <th class="p-3 text-center font-medium border-b">Website</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($industris as $industri)
                        <tr class="border-b last:border-b-0 hover:bg-gray-50 transition">
                            <td class="p-3">{{ $industri->nama }}</td>
                            <td class="p-3">{{ $industri->bidang_usaha }}</td>
                            <td class="p-3">{{ $industri->alamat }}</td>
                            <td class="p-3">{{ $industri->kontak }}</td>
                            <td class="p-3">{{ $industri->email }}</td>
                            <td class="p-3">{{ $industri->website }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center p-6 text-gray-500">
                                Tidak ada data industri ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $industris->onEachSide(1)->links() }}
        </div>
    </div>
</div>