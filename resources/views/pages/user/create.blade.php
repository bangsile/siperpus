<x-layouts.app>
    @section('title', 'Tambah Pengguna | Perpustakaan')

    <div class="p-4 mt-14">
        <section class="bg-white dark:bg-gray-900">
            <div class="px-4 max-w-md">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Pengguna</h2>
                <livewire:user.user-create-form />
            </div>
        </section>
    </div>
        @if (session('errorCreate'))
        <x-alert type="error" message="{{ session()->get('errorCreate') }}" position="top" />
    @endif
</x-layouts.app>
