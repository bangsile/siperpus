@props(['href', 'icon', 'active'])
<li>
    <a href="{{ $href }}"
        class="flex items-center p-2 rounded-lg {{ $active ? 'text-white bg-blue-500' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-900' }}">
        <i class="{{ $icon }} text-lg"></i>
        <span class="ms-3">{{ $slot }}</span>
    </a>
</li>
