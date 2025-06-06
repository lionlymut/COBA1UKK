<div class="flex justify-center items-center min-h-screen bg-gray-50">
    <div class="bg-white border-2 border-blue-400 rounded-xl shadow-md p-8 w-full max-w-md h-auto">
        <h2 class="text-center text-xl font-bold text-blue-900 mb-6">TAMBAH DATA PKL</h2>

        {{-- Notifikasi berhasil --}}
        @if (session()->has('message'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        {{-- Notifikasi error --}}
        @if (session()->has('error'))
            <div class="bg-red-500 text-white p-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{-- Cek apakah sudah input --}}
        @if ($sudahInput)
            {{-- Pop-up SweetAlert --}}
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        title: 'Peringatan!',
                        text: 'Kamu sudah mengisi data PKL. Tidak dapat mengisi ulang.',
                        icon: 'warning',
                        confirmButtonText: 'OK',
                        didClose: () => {
                            window.location.href = "{{ route('input.index') }}";
                        }
                    });
                });
            </script>
        @else
            {{-- Form Input PKL --}}
            <form wire:submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium">Nama Siswa</label>
                    <select wire:model="siswa_id" class="w-full border p-2 rounded">
                        <option value="">Pilih Siswa</option>
                        @foreach($siswas as $siswa)
                            <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                        @endforeach
                    </select>
                    @error('siswa_id') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium">Industri</label>
                    <select wire:model="industri_id" class="w-full border p-2 rounded">
                        <option value="">Pilih Industri</option>
                        @foreach($industris as $industri)
                            <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                        @endforeach
                    </select>
                    @error('industri_id') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium">Assesor</label>
                    <select wire:model="guru_id" class="w-full border p-2 rounded">
                        <option value="">Pilih Guru</option>
                        @foreach($gurus as $guru)
                            <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                        @endforeach
                    </select>
                    @error('guru_id') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium">Tanggal Mulai</label>
                    <input type="date" wire:model="tanggal_mulai" class="w-full border p-2 rounded" />
                    @error('tanggal_mulai') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium">Tanggal Selesai</label>
                    <input type="date" wire:model="tanggal_selesai" class="w-full border p-2 rounded" />
                    @error('tanggal_selesai') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-400 transition duration-200">
                        Simpan
                    </button>
                </div>
            </form>
        @endif
    </div>
</div>
