@props([
    'id' => 'modal-id',
    'title' => null,
    'confirmText' => 'Ya',
    'cancelText' => 'Batal',
    'confirmAction' => null,
    'close' => null
])

<div id="{{ $id }}" tabindex="-1" wire:click.outside="{{ $close }}"
    class="fixed top-0 right-0 left-0 z-50 bg-black/50 overflow-y-auto overflow-x-hidden w-full md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-md max-h-full mx-auto top-1/2 -translate-y-1/2">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" wire:click="{{ $close }}"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Tutup</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                @if ($title)
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        {{ $title }}
                    </h3>
                @endif

                {{ $slot }}

                <div class="mt-4 flex justify-center gap-3">
                    <button type="button"
                        @if ($confirmAction)
                            wire:click="{{ $confirmAction }}"
                        @endif
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        {{ $confirmText }}
                    </button>
                    <button wire:click="{{ $close }}" type="button"
                        class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100">
                        {{ $cancelText }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
