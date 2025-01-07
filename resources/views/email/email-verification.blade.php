<div class="container mx-auto mt-5 flex justify-center w0">
    <div class="w-1/2 max-w-md">
        <div class="bg-white shadow-md rounded-lg text-center">
            <div class="p-4">
                <img src="https://i.ibb.co/f4QM7qW/ZCJ-logo.png" alt="ZCJ-logo" border="0" style="display: block; margin-left: auto; margin-right: auto; height: 9rem; width: auto;">
            </div>
            <div class="bg-blue-500 text-white p-4 rounded-t-lg">
                <h2 class="text-xl font-semibold">Please Verify Your Email</h2>
            </div>
            <div class="p-6">
                <p class="mb-4">Please verify your email by clicking the button below:</p>
                <a href="{{ $url }}"
                    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 inline-block text-center">Verify
                    Email</a>
                <hr class="my-4">
                <p class="mb-2">If you're having trouble clicking the verify email button, copy and paste the URL
                    below in your web browser:</p>
                <a href="{{ $url }}" class="text-blue-500 break-all">{{ $url }}</a>
            </div>
        </div>
    </div>
</div>
