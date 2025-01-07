<div id="viewPendingUserModal{{ $record->visitor_id }}" class="fixed z-10 inset-0 overflow-y-auto hidden"
    aria-labelledby="viewPendingUserModalLabel" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity dark:bg-gray-900 dark:bg-opacity-75"
            aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white dark:bg-gray-800 px-6 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-blue-300"
                            id="viewPendingUserModalLabel">Edit Visitor Information</h3>
                        <button type="button"
                            class="absolute top-0 right-0 mt-4 mr-4 text-gray-400 hover:text-gray-500 dark:hover:text-gray-300"
                            onclick="toggleModal('viewPendingUserModal{{ $record->visitor_id }}')">
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <form action="{{ route('admins.users.registered.update', ['id' => $record->visitor_id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-500 dark:text-gray-300"><strong>First
                                            Name:</strong></label>
                                    <input type="text" name="first_name" value="{{ $record->first_name }}"
                                        class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                                        required>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-500 dark:text-gray-300"><strong>Last
                                            Name:</strong></label>
                                    <input type="text" name="last_name" value="{{ $record->last_name }}"
                                        class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                                        required>
                                </div>
                            </div>
                            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label
                                        class="block text-sm text-gray-500 dark:text-gray-300"><strong>Birthdate:</strong></label>
                                    <input type="date" name="date_of_birth" value="{{ $record->date_of_birth }}"
                                        class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                                        required>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm text-gray-500 dark:text-gray-300"><strong>Gender:</strong></label>
                                    <select name="gender_id"
                                        class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                                        required>
                                        <option value="1" {{ $record->gender_id == 1 ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="2" {{ $record->gender_id == 2 ? 'selected' : '' }}>Female
                                        </option>
                                        <option value="3" {{ $record->gender_id == 3 ? 'selected' : '' }}>Other
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label
                                    class="block text-sm text-gray-500 dark:text-gray-300"><strong>Address:</strong></label>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label
                                            class="block text-sm text-gray-500 dark:text-gray-300"><strong>Street:</strong></label>
                                        <input type="text" id="address_street" name="address_street"
                                            value="{{ $record->address_street }}"
                                            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                                            required>
                                    </div>
                                    <div>
                                        <label
                                            class="block text-sm text-gray-500 dark:text-gray-300"><strong>City:</strong></label>
                                        <input type="text" id="address_city" name="address_city"
                                            value="{{ $record->address_city }}"
                                            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                                            required>
                                    </div>
                                    <div>
                                        <label
                                            class="block text-sm text-gray-500 dark:text-gray-300"><strong>Province:</strong></label>
                                        <input type="text" id="address_province" name="address_province"
                                            value="{{ $record->address_province }}"
                                            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                                            required>
                                    </div>
                                    <div>
                                        <label
                                            class="block text-sm text-gray-500 dark:text-gray-300"><strong>Barangay:</strong></label>
                                        <input type="text" id="address_barangay" name="address_barangay"
                                            value="{{ $record->address_barangay }}"
                                            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                                            required>
                                    </div>
                                    <div class="col-span-2">
                                        <label
                                            class="block text-sm text-gray-500 dark:text-gray-300"><strong>Zip:</strong></label>
                                        <input type="text" id="address_zip" name="address_zip"
                                            value="{{ $record->address_zip }}"
                                            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-500 dark:text-gray-300"><strong>Username:</strong></label>
                                    <input type="text" name="username" value="{{ $record->username }}"
                                        class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                                </div>
                            </div>
                            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-500 dark:text-gray-300"><strong>Contact
                                            Number:</strong></label>
                                    <input type="text" name="contact_number" value="{{ $record->contact_number }}"
                                        class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                                        required>
                                </div>
                                <div>
                                    <label
                                        class="block text-sm text-gray-500 dark:text-gray-300"><strong>Email:</strong></label>
                                    <input type="email" name="email" value="{{ $record->email }}"
                                        class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-gray-300"
                                        required>
                                </div>
                            </div>
                            <div class="mt-6">
                                <button type="submit"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
