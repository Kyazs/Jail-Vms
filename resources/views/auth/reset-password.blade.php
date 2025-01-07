<x-def-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 m:mx-auto sm:w-full sm:max-w-2xl">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-36 w-auto" src="{{ asset('images/ZCJ-logo.png') }}" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 dark:text-gray-100">
                Reset Password</h2>
        </div>
        <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ request()->route('token') }}">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Email Address</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" required class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">New Password</label>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" required class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Confirm Password</label>
                    <div class="mt-2">
                        <input type="password" name="password_confirmation" id="password_confirmation" required class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 dark:bg-indigo-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 dark:hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:focus-visible:outline-indigo-400">Reset Password</button>
                </div>
            </form>
            @if ($errors->any())
                <div class="mt-4">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-600">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-def-layout>
