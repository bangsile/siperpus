{{-- @dd($shelves) --}}
<form wire:submit="save" method="POST">
    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
        <div class="">
            <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Buku</label>
            <input type="text" name="code" id="code" wire:model="code"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-blue-600  block w-full p-2.5 ">
            @error('code')
                <p class="pt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                Buku</label>
            <input type="text" name="title" id="title" wire:model="title"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-blue-600  block w-full p-2.5 ">
            @error('title')
                <p class="pt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full">
            <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengarang</label>
            <input type="text" name="author" id="author" wire:model="author"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-blue-600  block w-full p-2.5">
            @error('author')
                <p class="pt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full">
            <label for="publisher" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
            <input type="text" name="publisher" id="publisher" wire:model="publisher"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-blue-600  block w-full p-2.5">
            @error('publisher')
                <p class="pt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full">
            <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun</label>
            <input type="text" name="year" id="year" wire:model="year"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-blue-600  block w-full p-2.5">
            @error('year')
                <p class="pt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
            <select id="category" wire:model="category"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                <option selected value="">Pilih Kategori</option>
                @foreach ($shelves as $shelf)
                    <optgroup label='{{ "{$shelf->name} ({$shelf->code})" }}'>
                        @foreach ($shelf->categories as $category)
                            <option value="{{ $category->id }}">
                                {{ "{$category->name} ({$category->code})" }}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach

            </select>
            @error('category')
                <p class="pt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full">
            <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
            <input type="number" min="0" name="stock" id="stock" wire:model="stock"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-blue-600  block w-full p-2.5">
            @error('stock')
                <p class="pt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <button type="submit"
        class="inline-flex items-center px-5 py-2 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg focus:outline-4 focus:outline-blue-200">
        Tambah
    </button>
</form>
