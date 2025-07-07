<div class="sm:rounded-lg max-h-[80vh]">
    <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
        <div class="flex items-center">
            <select wire:model.live="perPage"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1.5">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <div class="ms-3 text-sm text-gray-600">data per halaman</div>
        </div>
        <div class="relative">
            <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari"
                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" />
            <div class="absolute inset-y-0 left-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>

    <div class="relative overflow-y-auto max-h-[70vh]">
        <table class="w-full text-sm text-left text-gray-500 rounded">
            <thead class="sticky top-0 z-10 text-xs text-gray-700 uppercase bg-gray-100 rounded">
                <tr>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Username</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Role</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr wire:key="{{ $user->id }}" class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                        <td class="px-6 py-4">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->username }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">{{ $user->getRoleNames()->first() }}</td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('users.edit', $user->username) }}" wire:navigate
                                class=" p-2 rounded text-sm text-emerald-600 hover:text-emerald-700">
                                <i class="fa-solid fa-pen"></i></a>
                            <button wire:click="confirmDelete('{{ $user->id }}')"
                                class=" p-2 rounded text-sm text-red-500 hover:text-red-700">
                                <i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada data ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pt-4">
        {{ $users->links('components.pagination-custom') }}
    </div>

    @if ($showModal)
        <x-modal-delete title="Yakin ingin menghapus pengguna ini?" confirmText="Ya, Hapus" confirmAction="deleteUser"
            close="$set('showModal', false)">
        </x-modal-delete>
    @endif

</div>