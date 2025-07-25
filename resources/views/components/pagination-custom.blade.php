<nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between items-center mt-4">
    @if ($paginator->hasPages())
        {{-- Mobile view: Previous & Next only --}}
        <div class="flex-1 sm:hidden flex justify-between">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="px-4 py-2 text-sm text-gray-400 bg-gray-100 rounded">Sebelumnya</span>
            @else
                <button wire:click="previousPage"
                    class="px-4 py-2 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">
                    Sebelumnya
                </button>
            @endif

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <button wire:click="nextPage" class="px-4 py-2 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">
                    Berikutnya
                </button>
            @else
                <span class="px-4 py-2 text-sm text-gray-400 bg-gray-100 rounded">Berikutnya</span>
            @endif
        </div>
    @endif

    {{-- Desktop pagination --}}
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between w-full">
        <div>
            <p class="text-sm text-gray-600">
                Menampilkan
                <span class="font-medium">{{ $paginator->firstItem() }}</span>
                -
                <span class="font-medium">{{ $paginator->lastItem() }}</span>
                dari
                <span class="font-medium">{{ $paginator->total() }}</span>
                data
            </p>
        </div>

        @if ($paginator->hasPages())
            <div>
                <span class="relative z-0 inline-flex rounded-md shadow-sm">
                    {{-- Tombol Previous --}}
                    @if ($paginator->onFirstPage())
                        <span class="px-2 py-2 text-sm text-gray-400 bg-white border border-gray-300 rounded-l-md">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    @else
                        <button wire:click="previousPage"
                            class="px-2 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-100">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    @endif

                    {{-- Tombol Nomor Halaman --}}
                    @foreach ($elements as $element)
                        {{-- Dots --}}
                        @if (is_string($element))
                            <span class="px-4 py-2 text-sm text-gray-700 bg-white border-t border-b border-gray-300">
                                {{ $element }}
                            </span>
                        @endif

                        {{-- Page numbers --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page"
                                        class="px-4 py-2 text-sm text-white bg-blue-600 border border-gray-300">
                                        {{ $page }}
                                    </span>
                                @else
                                    <button wire:click="gotoPage({{ $page }})"
                                        class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 hover:bg-gray-100">
                                        {{ $page }}
                                    </button>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Tombol Next --}}
                    @if ($paginator->hasMorePages())
                        <button wire:click="nextPage"
                            class="px-2 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-100">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    @else
                        <span class="px-2 py-2 text-sm text-gray-400 bg-white border border-gray-300 rounded-r-md">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    @endif
                </span>
            </div>
        @endif
    </div>
</nav>
