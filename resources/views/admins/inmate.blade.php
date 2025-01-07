<x-admin-layout>
    <main>
        <div class="flex justify-between items-center m-6">
            <form action="{{ route('admin.inmate.search') }}" method="GET" class="flex items-center space-x-2">
                <input type="text" name="search" placeholder="Search Inmates"
                    class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600">Search</button>
            </form>
            @if (auth()->user()->role_id == 1)
                <a href="#" onclick="toggleModal('addInmateModal')"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600">Add
                    Inmate</a>
            @endif
        </div>
        @include('/components/modals/add-inmate-modal')
        <div class=" overflow-x-auto shadow-md sm:rounded-lg m-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        @foreach (['Inmate ID', 'Full Name', 'Gender', 'Cell Number', 'Created', 'Action'] as $header)
                            <th scope="col" class="px-6 py-3">
                                {{ $header }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inmate as $int)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 {{ $int->is_deleted == 1 ? 'text-red-500' : '' }}">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $int->inmate_number }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $int->first_name }} {{ $int->last_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $int->gender_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $int->cell_number }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $int->created_at }}
                            </td>
                            <td class="px-2 py-4 overflow-hidden">
                                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown{{ $int->id }}"
                                    type="button">
                                    <i
                                        class="material-icons text-gray-200 hover:text-blue-700 dark:hover:text-blue-700">more_horiz</i>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdown{{ $int->id }}"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700 absolute mt-2 right-0">
                                    <ul class="py-2" aria-labelledby="dropdownDefaultButton">
                                        @if (auth()->user()->role_id == 1)
                                            <li>
                                                <form action="{{ route('admin.inmate.delete', ['id' => $int->id]) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this inmate?');">
                                                    @csrf
                                                    <button type="submit"
                                                        class="block w-full text-left px-3 py-1 text-red-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500">
                                                        Delete
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <div class="mt-4">
                                                    <a href="#"
                                                        onclick="toggleModal('InmateUpdateModal{{ $int->id }}')"
                                                        class="block w-full text-left px-3 py-1 text-blue-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-blue-500">
                                                        Update Inmate Information
                                                    </a>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @include('/components/modals/update-inmate')
            </table>
            <div class="mt-4">
                <div class="flex flex-col items-center">
                    <!-- Help text -->
                    <span class="text-sm text-gray-700 dark:text-gray-400">
                        Showing <span
                            class="font-semibold text-gray-900 dark:text-white">{{ $inmate->firstItem() }}</span> to
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $inmate->lastItem() }}</span> of
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $inmate->total() }}</span> Entries
                    </span>
                    <!-- Pagination Links -->
                    <div class="inline-flex mt-2 xs:mt-0">
                        {{ $inmate->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-admin-layout>
