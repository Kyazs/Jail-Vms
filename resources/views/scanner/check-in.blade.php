<!-- resources/views/scanner/check-in.blade.php -->

<x-def-layout>
    <div
        class="flex min-h-full flex-col justify-center items-center px-6 py-12 lg:px-8 m:mx-auto sm:w-full sm:max-w-2xl">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 dark:text-gray-100">
            Visitor Check-In
        </h2>
        @include('components.modals.scan-qr-modal')
        <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('process.qr') }}" method="POST">
                @csrf
                <div x-data="{
                    query: '',
                    suggestions: [],
                    selectedInmateId: null,
                    searchTimeout: null,
                    search() {
                        clearTimeout(this.searchTimeout);
                        this.searchTimeout = setTimeout(() => {
                            if (this.query.length < 2) {
                                this.suggestions = [];
                                return;
                            }
                            fetch(`{{ route('search.scanner.inmate') }}?query=${this.query}`)
                                .then(response => response.json())
                                .then(data => this.suggestions = data)
                                .catch(console.error);
                        }, 300); // Adjust the delay as needed
                    }
                }" class="relative mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                    <label for="inmate_id"
                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Inmate Name</label>
                    <input type="text" x-model="query" @input="search" placeholder="Search user..."
                        name="inmate_name"
                        class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                    <input type="hidden" x-model="selectedInmateId" name="inmate_id">
                    <div class="absolute z-10 bg-white border border-gray-300 w-full" x-show="suggestions.length > 0">
                        <template x-for="user in suggestions" :key="user.id">
                            <div class="p-2 hover:bg-gray-100 cursor-pointer"
                                @click="query = `${user.first_name} ${user.last_name} - ${user.inmate_number}`; selectedInmateId = user.id; suggestions = []">
                                <span x-text="`${user.first_name} ${user.last_name} - ${user.inmate_number}`"></span>
                            </div>
                        </template>
                    </div>
                </div>
                <div>
                    <label for="relationship"
                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Relationship to
                        Inmate</label>
                    <div class="mt-2">
                        <input id="relationship" name="relationship" type="text" required
                            class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                    </div>
                    <input type="text" name="qr_code" id="qr_code" hidden required>
                </div>
                <div>
                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('landingpage') }}"
                            class="flex justify-center rounded-md bg-gray-600 dark:bg-gray-500 px-6 py-2 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-500 dark:hover:bg-gray-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 dark:focus-visible:outline-gray-400 transition duration-150 ease-in-out">Back</a>
                        <button type="submit"
                            class="flex justify-center rounded-md bg-blue-600 dark:bg-blue-500 px-6 py-2 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 dark:hover:bg-blue-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 dark:focus-visible:outline-blue-400 transition duration-150 ease-in-out">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-def-layout>
