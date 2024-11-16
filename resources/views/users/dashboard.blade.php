<x-layout>
    <div class="">
        <div class="flex justify-center items-center mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Date</th>
                        <th scope="col" class="px-6 py-3">Inmate ID</th>
                        <th scope="col" class="px-6 py-3">Inmate Name</th>
                        <th scope="col" class="px-6 py-3">Check-in Time</th>
                        <th scope="col" class="px-6 py-3">Check-Out Time</th>
                        <th scope="col" class="px-6 py-3">Duration</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visits as $visit)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $visit->check_in_time }}</td>
                            <td class="px-6 py-4">{{ $visit->inmate_id }}</td>
                            <td class="px-6 py-4">{{ $visit->inmate_name }}</td>
                            <td class="px-6 py-4">{{ $visit->check_in_time }}</td>
                            <td class="px-6 py-4">{{ $visit->check_out_time }}</td>
                            <td class="px-6 py-4">{{ $visit->visit_duration }} min</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $visits->links() }}
            </div>
        </div>
    </div>
</x-layout>
