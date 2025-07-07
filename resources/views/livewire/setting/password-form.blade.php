<form wire:submit="save" method="POST" class="max-w-md">
    <div class="grid gap-4 sm:grid-cols-1 sm:gap-6">
        <div class="">
            <label for="currentPassword" class="block mb-2 text-sm font-medium text-gray-900">Password sekarang</label>
            <input type="password" name="currentPassword" id="currentPassword" wire:model="currentPassword"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-blue-600  block w-full p-2.5 ">
            @error('currentPassword')
                <p class="pt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full">
            <label for="newPassword" class="block mb-2 text-sm font-medium text-gray-900">Password baru</label>
            <input type="password" name="newPassword" id="newPassword" wire:model="newPassword"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-blue-600  block w-full p-2.5 ">
            @error('newPassword')
                <p class="pt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full">
            <label for="confirmPassword" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi password baru</label>
            <input type="password" name="confirmPassword" id="confirmPassword" wire:model="confirmPassword"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-blue-600  block w-full p-2.5">
            @error('confirmPassword')
                <p class="pt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <button type="submit"
        class="inline-flex items-center px-5 py-2 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg focus:outline-4 focus:outline-blue-200">
        Simpan
    </button>
</form>