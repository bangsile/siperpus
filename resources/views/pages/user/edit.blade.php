<x-layouts.app>
    @section('title', 'Tambah Pengguna | Perpustakaan')

    <div class="p-4 mt-14">
        <section class="bg-white dark:bg-gray-900">
            <div class="px-4 max-w-md">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Pengguna</h2>
                <livewire:user.user-edit-form username="{{ $username }}"/>
            </div>
        </section>
    </div>
    @if (session('success'))
        <x-alert type="success" message="{{ session()->get('success') }}" position="top" />
    @endif
    @if (session('error'))
        <x-alert type="error" message="{{ session()->get('error') }}" position="top" />
    @endif
</x-layouts.app>