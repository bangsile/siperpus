<x-layouts.app>
    @section('title', 'Pengaturan | Perpustakaan')

    <div class="p-4 mt-14">
        <h2 class="mb-4 text-xl font-bold text-gray-900">Pengaturan</h2>
        <div class="md:flex mt-10">
            <ul
                class="flex-column space-y space-y-3 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0">
                <li>
                    <a href="{{ route('setting.profile') }}" wire:navigate
                        class="inline-flex items-center px-4 py-2 w-full rounded-lg 
                        {{ Route::is('setting.profile') ? 'text-white bg-blue-500' : 'hover:text-gray-900 hover:bg-gray-100'}}"
                        aria-current="page">
                        Profil
                    </a>
                </li>
                <li>
                    <a href="{{ route('setting.password') }}" wire:navigate
                        class="inline-flex items-center px-4 py-2 rounded-lg w-full 
                        {{ Route::is('setting.password') ? 'text-white bg-blue-500' : 'hover:text-gray-900 hover:bg-gray-100'}}">
                        Password
                    </a>
                </li>
            </ul>
            <div class="p-6 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full">
                {{ $slot }}
            </div>
        </div>
    </div>
    @if (session('errorUpdate'))
        <x-alert type="error" message="{{ session()->get('errorUpdate') }}" position="top" />
    @endif
    @if (session('successUpdate'))
        <x-alert type="success" message="{{ session()->get('successUpdate') }}" position="top" />
    @endif
</x-layouts.app>