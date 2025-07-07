<x-layouts.app>
    @section('title', 'Daftar Pengguna | Perpustakaan')

    <div class="p-4 mt-14">
        <a href="{{ route('users.create') }}" wire:navigate
            class=" text-sm bg-blue-500 text-white font-medium rounded px-3 py-2 mb-3 inline-flex justify-center items-center">
            <i class="fa-solid fa-plus me-2"></i> Tambah Pengguna
        </a>
        <livewire:user.user-list />
    </div>
    @if (session('successCreate'))
        <x-alert type="success" message="{{ session()->get('successCreate') }}" />
    @endif
</x-layouts.app>
