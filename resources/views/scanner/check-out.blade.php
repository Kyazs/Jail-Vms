<x-def-layout>
    
    <form action="{{ route('check.out') }}" method="POST">
        @csrf
        <input type="text" id="qr_code" name="qr_code" hidden required>
        @include('components.modals.scan-qr-modal')
        <div class="flex justify-center mt-5">
            <a href="{{ route('landingpage') }}" class="btn btn-secondary px-5 py-2.5 no-underline text-white bg-gray-600 rounded mr-2">Back</a>
            <button type="submit" class="btn btn-primary px-5 py-2.5 no-underline text-white bg-blue-500 rounded">Submit</button>
        </div>
    </form>

</x-def-layout>
