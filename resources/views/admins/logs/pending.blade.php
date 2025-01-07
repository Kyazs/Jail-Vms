<x-admin-layout>
    <!-- Main Content -->
    <div class="main-content p-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">PENDING VISITS</h1>
        <div class="mt-6">
            <form class="max-w-md">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <i class="material-icons text-gray-400">search</i>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 
                        focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for a pending Visit...." required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
        </div>
        <div class="sm:rounded-lg mt-6">
            <div class="overflow-y-auto max-h-96">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            @foreach (['Visit ID', 'Visitor Name', 'Inmate Name', 'Relationship' , 'Address', 'Username', 'Contact Number', 'Created', 'Action'] as $header)
                                <th scope="col" class="px-6 py-3">{{ $header }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $rec)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $rec->visit_id }} </th>
                                <td class="px-6 py-4"> {{ $rec->visitor_name }} </td>
                                <td class="px-6 py-4"> {{ $rec->inmate_name }} </td>
                                <td class="px-6 py-4"> {{ $rec->relationship }} </td>
                                <td class="px-6 py-4"> {{ $rec->address }} </td>
                                <td class="px-6 py-4"> {{ $rec->username }} </td>
                                <td class="px-6 py-4"> {{ $rec->contact_number }} </td>
                                <td class="px-6 py-4"> {{ $rec->check_in_time }} </td>
                                <td class="px-2 py-4 overflow-hidden">
                                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown{{ $rec->visitor_id }}" type="button">
                                        <i class="material-icons text-gray-200 hover:text-blue-700 dark:hover:text-blue-700">more_horiz</i>
                                    </button>
                                    <div id="dropdown{{ $rec->visitor_id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700 absolute mt-2 right-0">
                                        <ul class="py-2" aria-labelledby="dropdownDefaultButton">
                                            <li>
                                                <a href="{{ route('users.profile.show', ['id' => $rec->visitor_id]) }}" class="block px-3 py-1 text-blue-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-blue-500">View Details</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('visit.confirm', ['id' => $rec->visit_id]) }}" onclick="return confirm('Are you sure you want to CONFIRM this person visit?');" class="block px-3 py-1 text-green-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-green-500">Confirm</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('visit.reject', ['id' => $rec->visit_id]) }}" onclick="return confirm('Are you sure you want to REJECT this person visit?');" class="block px-3 py-1 text-red-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500">Reject</a>
                                            </li>
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
                    <!-- Pagination Links -->
                    <div class="inline-flex mt-2 xs:mt-0">
                        {{ $records->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
