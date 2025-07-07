<x-layouts.app>
    @section('title', 'Daftar Pengguna | Perpustakaan')

    <div class="p-4 mt-14">
        <h2 class="mb-10 text-xl font-bold text-gray-900 dark:text-white">Daftar Pengguna</h2>
        <a href="{{ route('users.create') }}" wire:navigate
            class=" text-sm bg-blue-500 text-white font-medium rounded px-3 py-2 mb-3 inline-flex justify-center items-center">
            <i class="fa-solid fa-plus me-2"></i> Tambah Pengguna
        </a>
        <livewire:user.user-list />
    </div>
    @if (session('successCreate') || session('success'))
        <x-alert type="success" message="{{ session('successCreate') ?? session('success') }}" />
    @endif
    @if (session('error'))
        <x-alert type="error" message="{{ session('error') }}" />
    @endif
</x-layouts.app>