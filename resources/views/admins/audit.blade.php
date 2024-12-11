<x-admin-layout>
    <!-- Main Content -->
    <div class="main-content p-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">AUDIT LOG</h1>
        <div class="mt-6 flex justify-between items-center">
            <form class="flex-grow max-w-md mr-4" action="{{ route('audit.search') }}" method="GET">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <i class="material-icons text-gray-400">search</i>
                    </div>
                    <input type="search" id="default-search" name="search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 
                        focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for a VisitOR...." />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
            <div class="flex flex-row gap-5">
                <div class="max-w-xs">
                    <label for="sort-by" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Sort by</label>
                    <select id="sort-by" name="sort-by"
                        class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 
                    focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                    dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" hidden selected>Sort by</option>
                        <option value="visitor_name">Newest</option>
                        <option value="inmate_name">Oldest</option>
                    </select>
                </div>
                <div class="max-w-xs">
                    <label for="action-type" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Action
                        Type</label>
                    <select id="action-type" name="action-type"
                        class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 
                    focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                    dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Default</option>
                        @foreach ([
        'visitor_registered' => 'Visitor Registered',
        'visitor_updated' => 'Visitor Updated',
        'visitor_blacklisted' => 'Visitor Blacklisted',
        'visitor_unblacklisted' => 'Visitor Unblacklisted',
        'inmate_added' => 'Inmate Added',
        'inmate_updated' => 'Inmate Updated',
        'inmate_deleted' => 'Inmate Deleted',
        'visit_started' => 'Visit Started',
        'visit_completed' => 'Visit Completed',
        'visit_cancelled' => 'Visit Cancelled',
        'user_added' => 'User Added',
        'user_updated' => 'User Updated',
        'user_deleted' => 'User Deleted',
    ] as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        @foreach (['Timestamp', 'User ID', 'Username', 'Action Type', 'Affected Entities', 'Details'] as $header)
                            <th scope="col" class="px-6 py-3">{{ $header }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr
                            class="relative odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="px-6 py-4">{{ $log->created_at }}</td>
                            <td class="px-6 py-4">{{ $log->user_id }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $log->username }}</td>
                            <td class="px-6 py-4">{{ $log->action_type_id }} - {{ $log->action_type_name }}</td>
                            <td class="px-6 py-4">
                                @if ($log->visitor_id)
                                    Visitor: {{ $log->visitor_id }} - {{ $log->visitor_name }}<br>
                                @endif
                                @if ($log->inmate_id)
                                    Inmate: {{ $log->inmate_name }}<br>
                                @endif
                                @if ($log->visit_id)
                                    Visit ID: {{ $log->visit_id }}<br>
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $log->details }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <div class="flex flex-col items-center">
                <!-- Pagination Links -->
                <div class="inline-flex mt-2 xs:mt-0">
                    {{ $logs->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
