<x-layouts.app>
    @section('title', 'Daftar Buku | Perpustakaan')

    <div class="p-4 mt-14">
        <h2 class="mb-10 text-xl font-bold text-gray-900 dark:text-white">Daftar Buku</h2>
        
        <livewire:book.book-list />
    </div>
    @if (session('success'))
        <x-alert type="success" message="{{ session('success') }}" />
    @endif
    @if (session('error'))
        <x-alert type="error" message="{{ session('error') }}" />
    @endif
</x-layouts.app>