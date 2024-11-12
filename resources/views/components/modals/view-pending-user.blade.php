<div id="viewPendingUserModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="viewPendingUserModalLabel" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity dark:bg-gray-900 dark:bg-opacity-75" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-center w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100" id="viewPendingUserModalLabel">Pending Visitor Information</h3>
                        <button type="button" class="absolute top-0 right-0 mt-4 mr-4 text-gray-400 hover:text-gray-500 dark:hover:text-gray-300" onclick="toggleModal('viewPendingUserModal')">
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <div class="mt-2">
                            <div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach([
                                'First Name' => 'Jane',
                                'Last Name' => 'Doe',
                                'Middle Name' => 'A.',
                                'Contact Number' => '09123456789',
                                'Birthdate (MM/DD/YY)' => '01/01/1990',
                                'Email' => 'jane.doe@example.com',
                                'Gender' => 'Female',
                                'Uploaded ID' => '<img src="/images/ZCJ-logo.png" alt="Uploaded ID" class="w-24 h-24 mx-auto">',
                                'Country' => 'USA',
                                'Province' => 'California',
                                'City' => 'Los Angeles',
                                'Barangay' => 'Barangay 123',
                                'Building Number/Village' => '1234 Elm Street',
                                'Username' => 'JaneD123',
                                ] as $label => $value)
                                <div class="flex flex-col outline-dashed">
                                    <span class="font-semibold text-gray-200 dark:text-gray-100">{{ $label }}</span>
                                    <span class="text-gray-700 dark:text-gray-300">{!! $value !!}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse justify-center">
                <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">Confirm</button>
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:w-auto sm:text-sm">Reject</button>
            </div>
        </div>
    </div>
</div>