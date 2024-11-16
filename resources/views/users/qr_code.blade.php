<x-layout>
    @php
    $qrCodeFileName = $visitor->qr_path;
    error_log($qrCodeFileName);
    @endphp
    <div class="flex flex-col justify-center items-center h-screen">
        <div class="border border-black p-5 bg-white text-center">
            <img src="{{ route('qr_codes', ['filename' => $qrCodeFileName]) }}" alt="QR Code" class="max-w-full h-auto">
        </div>
        <a href="{{ route('qr_codes', ['filename' => $qrCodeFileName]) }}" download="{{ $qrCodeFileName }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5 inline-block">Download QR Code</a>
    </div>
</x-layout>