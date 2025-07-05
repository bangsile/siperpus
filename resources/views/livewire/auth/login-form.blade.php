<div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" wire:submit="login" method="POST">
        <div>
            <label for="username" class="block text-sm/6 font-medium text-gray-900">Username</label>
            <div class="mt-2">
                <input wire:model="username" type="text" name="username" id="username" autocomplete="username" tabindex="1"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm/6" />
                @error('username')
                    <label class="block text-sm/6 font-medium text-red-600">{{ $message }}</label>
                @enderror
            </div>
        </div>

        <div>
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                <div class="text-sm">
                    <a href="#" class="font-semibold text-blue-600 hover:text-blue-500">
                        Lupa password?</a>
                </div>
            </div>
            <div class="mt-2">
                <input wire:model="password" type="password" name="password" id="password"
                    tabindex="2"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm/6" />
                @error('password')
                    <label class="block text-sm/6 font-medium text-red-600">{{ $message }}</label>
                @enderror
            </div>
        </div>

        @if (session('errorLogin'))
            <label class="block text-sm font-medium text-red-600 text-center pb">Login Gagal. Silahkan coba
                lagi.</label>
        @endif

        <div>
            <button type="submit" tabindex="3"
                class="flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                Login
            </button>
        </div>
    </form>
</div>
