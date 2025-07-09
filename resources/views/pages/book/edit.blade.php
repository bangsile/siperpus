<x-layouts.app>
    @section('title', 'Tambah Buku | Perpustakaan')

    <div class="p-4 mt-14">
        <section class="bg-white dark:bg-gray-900">
            <div class="px-4 max-w-2xl">
                <h2 class="mb-10 text-xl font-bold text-gray-900 dark:text-white">Edit Buku</h2>
                <livewire:book.book-edit-form id="{{ $id }}" />
            </div>
        </section>
    </div>
    @if (session('success'))
        <x-alert type="success" message="{{ session('success') }}" position="top" />
    @endif
    @if (session('error'))
        <x-alert type="error" message="{{ session('error') }}" position="top" />
    @endif
</x-layouts.app>
