<x-def-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 m:mx-auto sm:w-full sm:max-w-2xl">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-36 w-auto" src="{{ asset('images/ZCJ-logo.png') }}" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 dark:text-gray-100">
                Verify Your Email Address</h2>
        </div>
        <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            <p class="text-sm text-gray-900 dark:text-gray-100 bg-gray-600 p-4 rounded-lg">
                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email, click the button below to request another.') }}
            </p>
            <form class="space-y-6 d-inline" method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 dark:bg-indigo-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 dark:hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:focus-visible:outline-indigo-400">
                        {{ __('Resend Email Verification') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-def-layout>
