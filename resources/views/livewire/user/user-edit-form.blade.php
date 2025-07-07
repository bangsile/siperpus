<form wire:submit="save" method="POST">
    <div class="grid gap-4 sm:grid-cols-1 sm:gap-6">
        <div class="">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            <input type="text" name="name" id="name" wire:model="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-blue-600  block w-full p-2.5 ">
            @error('name')
                <p class="pt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full">
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
            <input type="text" name="username" id="username" wire:model="username"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-blue-600  block w-full p-2.5 ">
            @error('username')
                <p class="pt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="text" name="email" id="email" wire:model="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-blue-600  block w-full p-2.5">
            @error('email')
                <p class="pt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
            <select id="role" wire:model="role"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                <option selected value="">Pilih Role</option>
                <option value="admin">Admin</option>
                <option value="pustakawan">Pustakawan</option>
            </select>
            @error('role')
                <p class="pt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

    </div>
    <div class="flex gap-5">
        <button type="submit"
            class="inline-flex items-center px-5 py-2 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg focus:outline-4 focus:outline-blue-200">
            Simpan
        </button>
        <button type="button" wire:click="resetPassword"
            class="inline-flex items-center px-5 py-2 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-500 rounded-lg focus:outline-4 focus:outline-blue-200">
            Reset Password
        </button>
    </div>
</form>
