<x-def-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 m:mx-auto sm:w-full sm:max-w-2xl">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-36 w-auto" src="{{ asset('images/ZCJ-logo.png') }}" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 dark:text-gray-100">
                Sign in to your
                account</h2>
        </div>
        <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div>
                    <label for="username"
                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Username
                    </label>
                    <div class="mt-2">
                        <input id="username" name="username" type="text" autocomplete="username" required
                            placeholder="Enter your username"
                            class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                    </div>
                    @error('username')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password"
                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Password</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            placeholder="Enter your Password"
                            class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                    <div class="text-sm">
                        <a href="#"
                            class="font-semibold text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300">Forgot
                            password?</a>
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 dark:bg-indigo-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 dark:hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:focus-visible:outline-indigo-400">Sign
                        in</button>
                </div>
            </form>
        </div>
    </div>
</x-def-layout>
