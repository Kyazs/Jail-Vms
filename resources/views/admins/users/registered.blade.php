<x-admin-layout>
    <!-- Main Content -->
    <div class="main-content p-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">REGISTERED VISITOR</h1>
        <div class="mt-6">
            <form class="max-w-md">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 
                        focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for a Registered Visitor...." required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
            <table class="min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        @foreach (['ID', 'First Name', 'Last Name', 'Birthdate', 'Gender', 'Address', 'Username', 'Contact Number', 'Email', 'Creation Date', 'Action'] as $header)
                            <th scope="col" class="px-2 py-3">{{ $header }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $rec)
                        <tr
                            class="@if (isset($rec->deleted_at)) text-red-700 @endif relative odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $rec->visitor_id }} </th>
                            <td class="px-2 py-4">{{ $rec->first_name }}</td>
                            <td class="px-2 py-4">{{ $rec->last_name }}</td>
                            <td class="px-2 py-4">{{ $rec->date_of_birth }}</td>
                            <td class="px-2 py-4">{{ $rec->gender_name }}</td>
                            <td class="px-2 py-4">{{ $rec->address }}</td>
                            <td class="px-2 py-4">{{ $rec->username }}</td>
                            <td class="px-2 py-4">{{ $rec->contact_number }}</td>
                            <td class="px-2 py-4">{{ $rec->email }}</td>
                            <td class="px-2 py-4">{{ $rec->created_at }}</td>
                            <td class="px-2 py-4 overflow-hidden">
                                <button id="dropdownDefaultButton"
                                    data-dropdown-toggle="dropdown{{ $rec->visitor_id }}" type="button">
                                    <i
                                        class="material-icons text-gray-200 hover:text-blue-700 dark:hover:text-blue-700">more_horiz</i>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdown{{ $rec->visitor_id }}"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700 absolute mt-2 right-0">
                                    <ul class="py-2" aria-labelledby="dropdownDefaultButton">
                                        <li>
                                            <a href="{{ route('users.profile.show', ['id' => $rec->visitor_id]) }}"
                                                class="block px-3 py-1 text-blue-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-blue-500">View</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                onclick="toggleModal('viewPendingUserModal{{ $rec->visitor_id }}')"
                                                class="block px-3 py-1 text-blue-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-yellow-500">Edit</a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="toggleModal('addBlacklistModal{{ $rec->visitor_id }}')"
                                                class="block px-3 py-1 text-purple-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-purple-500">Add
                                                to Blacklist</a>
                                        </li>
                                        @if ($rec->deleted_at == 0)
                                            <li>
                                                <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this user?')) { document.getElementById('delete-form-{{ $rec->visitor_id }}').submit(); }"
                                                    class="block px-3 py-1 text-red-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500">Delete</a>
                                                <form id="delete-form-{{ $rec->visitor_id }}" action="{{ route('visitor.delete', ['id' => $rec->visitor_id]) }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        @else
                                        <li>
                                            <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to undelete this user?')) { document.getElementById('undelete-form-{{ $rec->visitor_id }}').submit(); }"
                                                class="block px-3 py-1 text-green-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-green-500">Undelete</a>
                                            <form id="undelete-form-{{ $rec->visitor_id }}" action="{{ route('visitor.undelete', ['id' => $rec->visitor_id]) }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @include('components.modals.update-register-visitor', ['record' => $rec])
                        @include('components.modals.add-blacklist', ['record' => $rec])
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <div class="flex flex-col items-center">
                <!-- Buttons -->
                <div class="inline-flex mt-2 xs:mt-0">
                    {{ $records->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
