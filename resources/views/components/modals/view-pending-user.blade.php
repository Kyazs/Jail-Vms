<div id="viewPendingUserModal{{ $record->id }}" class="fixed z-10 inset-0 overflow-y-auto hidden"
    aria-labelledby="viewPendingUserModalLabel" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity dark:bg-gray-900 dark:bg-opacity-75"
            aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100"
                            id="viewPendingUserModalLabel">Pending Visitor Information</h3>
                        <button type="button"
                            class="absolute top-0 right-0 mt-4 mr-4 text-gray-400 hover:text-gray-500 dark:hover:text-gray-300"
                            onclick="toggleModal('viewPendingUserModal{{ $record->id }}')">
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500 dark:text-gray-300"><strong>First Name:</strong>
                                {{ $record->first_name }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-300"><strong>Last Name:</strong>
                                {{ $record->last_name }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-300"><strong>Birthdate:</strong>
                                {{ $record->date_of_birth }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-300"><strong>Gender:</strong>
                                {{ $record->gender_name }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-300"><strong>Address:</strong>
                                {{ $record->address }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-300"><strong>ID Type:</strong>
                                {{ $record->id_name }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-300"><strong>ID Document:</strong>
                                {{ $record->id_name }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-300"><strong>Contact Number:</strong>
                                {{ $record->contact_number }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-300"><strong>ID Document:</strong></p>
                            <div class="flex justify-center mt-2">
                                <img src="{{ Storage::url($record->id_document_path) }}" alt="ID Document"
                                    class="rounded-md shadow-sm max-w-full h-auto">
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-300"><strong>Email:</strong>
                                {{ $record->email }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-300"><strong>Username:</strong>
                                {{ $record->username }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-300"><strong>Creation Date:</strong>
                                {{ $record->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse justify-center">
                <form action="{{ route('visitor.confirm', $record->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">Confirm</button>
                </form>
                <form action="{{ route('visitor.reject', $record->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:w-auto sm:text-sm">Reject</button>
                </form>
            </div>
        </div>
    </div>
</div>

