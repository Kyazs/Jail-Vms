<!-- resources/views/add-moderator-modal.blade.php -->
<div id="addModeratorModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity dark:bg-gray-900 dark:bg-opacity-75"
            aria-hidden="true">
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-center w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100" id="modal-title">Add
                            Moderator</h3>
                        <div class="mt-2">
                            <form class="flex flex-col items-center" action="{{ route('admins.users.moderator.store') }}"
                                method="POST">
                                @csrf
                                <div class="mb-4 w-full">
                                    <label for="first-name"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">First
                                        Name</label>
                                    <input type="text" id="first-name" name="first_name"
                                        value="{{ old('first_name') }}"
                                        class="mt-1 block w-full shadow-sm sm:text-lg border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-gray-300">
                                    @error('first_name')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4 w-full">
                                    <label for="last-name"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last
                                        Name</label>
                                    <input type="text" id="last-name" name="last_name" value="{{ old('last_name') }}"
                                        class="mt-1 block w-full shadow-sm sm:text-lg border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-gray-300">
                                    @error('last_name')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4 w-full">
                                    <label for="username"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username</label>
                                    <input type="text" id="username" name="username" value="{{ old('username') }}"
                                        class="mt-1 block w-full shadow-sm sm:text-lg border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-gray-300">
                                    @error('username')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4 w-full">
                                    <label for="role_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role</label>
                                    <select id="role_id" name="role_id" class="mt-1 block w-full shadow-sm sm:text-lg border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-gray-300">
                                        <option value="" hidden>Select Role</option>
                                        <option value="1" {{ old('role_id') == 1 ? 'selected' : '' }}>Admin</option>
                                        <option value="2" {{ old('role_id') == 2 ? 'selected' : '' }}>Moderator</option>
                                    </select>
                                    @error('role_id')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4 w-full">
                                    <label for="password"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                                    <input type="password" id="password" name="password"
                                        class="mt-1 block w-full shadow-sm sm:text-lg border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-gray-300">
                                    @error('password')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4 w-full">
                                    <label for="password_confirmation"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="mt-1 block w-full shadow-sm sm:text-lg border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-gray-300">
                                    @error('password_confirmation')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class=" px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse justify-center">
                                    <button type="submit"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">Add
                                        Moderator</button>
                                    <button type="button"
                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-800 text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                                        onclick="toggleModal('addModeratorModal')">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
