<x-admin-layout>
    @if (auth()->user()->role_id == 1)
        <div class="main-content p-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">MODERATOR</h1>
            <div class="mt-6 flex justify-between">
                <form class="max-w-fit" action=" {{ route('admins.users.moderator.search') }} " method="GET">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="material-icons text-gray-500 dark:text-gray-400">search</i>
                        </div>
                        <input type="search" id="default-search" name="search"
                            class="block w-full p-4 ps-10 pe-20 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 
                focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for a Moderator...." />
                        <button type="submit"
                            class="text-white absolute end-2.5 top-1/2 transform -translate-y-1/2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
                @if (auth()->user()->role_id == 1)
                    <div class="mt-4">
                        <a href="#" onclick="toggleModal('addModeratorModal')"
                            class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Add Moderator
                        </a>
                    </div>
                @endif
                @include('/components/modals/add-moderator-modal')
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            @foreach (['ID', 'First Name', 'Last Name', 'Username', 'Role', 'Creation Date', 'Action'] as $header)
                                <th scope="col" class="px-6 py-3">{{ $header }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $rec)
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $rec->user_id }} </th>
                                <td class="px-6 py-4"> {{ $rec->first_name }} </td>
                                <td class="px-6 py-4"> {{ $rec->last_name }} </td>
                                <td class="px-6 py-4"> {{ $rec->username }} </td>
                                <td class="px-6 py-4"> {{ $rec->role_name }} </td>
                                <td class="px-6 py-4"> {{ $rec->created_at }} </td>
                                <td class="px-6 py-4 overflow-hidden">
                                    <button id="dropdownDefaultButton"
                                        data-dropdown-toggle="dropdown{{ $rec->user_id }}" type="button">
                                        <i
                                            class="material-icons text-gray-200 hover:text-blue-700 dark:hover:text-blue-700">more_horiz</i>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdown{{ $rec->user_id }}"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700 absolute mt-2 right-0">
                                        <ul class="py-2" aria-labelledby="dropdownDefaultButton">
                                            <li>
                                                <a href="{{ route('admins.users.moderator.edit', $rec->user_id) }}"
                                                    class="block px-3 py-1 text-blue-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-blue-500">Edit</a>
                                            </li>
                                            {{-- <li>
                                                <a href="#"
                                                    class="block px-3 py-1 text-red-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-red-500">Reset
                                                    Password</a>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <div class="flex flex-col items-center">
                    {{ $records->links() }}
                </div>
            </div>
        </div>
    @endif
</x-admin-layout>
