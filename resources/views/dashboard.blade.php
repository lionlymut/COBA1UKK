<!-- resources/views/dashboard.blade.php -->
<x-app-layout>
    <div class="py-10">
        @php
            $user = auth()->user();
        @endphp

        @if ($user->roles->isEmpty())
            <div class="text-center text-red-600">
                Akun Anda belum diberikan role oleh admin. Silakan tunggu konfirmasi.
            </div>

        @elseif ($user->hasRole('siswa'))
            {{-- Tampilan khusus siswa --}}
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold mb-4">Halo, {{ $user->name }}</h3>
                    <p>Silakan input data PKL dan Industri:</p>
                    
                    {{-- Tambahkan komponen Livewire atau form input PKL dan Industri di sini --}}
                    @livewire('siswa.input-pkl')
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
