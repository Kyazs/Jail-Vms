<x-def-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 sm:mx-auto sm:w-full sm:max-w-2xl">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-36 w-auto" src="{{ asset('images/ZCJ-logo.png') }}" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 dark:text-gray-100">
                Create an Account
            </h2>
        </div>
        <div class="mt-10">
            <form class="space-y-6" action="" method="POST">
                @csrf <!-- CSRF token for security -->
                <!-- User Information Section -->
                <div>
                    <h3 class="text-lg font-semibold leading-6 text-gray-900 dark:text-gray-100 text-center">User
                        Information</h3>
                    <div class="mt-4 space-y-6">
                        <!-- First Name -->
                        <div>
                            <label for="first_name"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">First
                                Name</label>
                            <div class="mt-2">
                                <input id="first_name" name="first_name" type="text" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <!-- Last Name -->
                        <div>
                            <label for="last_name"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Last
                                Name</label>
                            <div class="mt-2">
                                <input id="last_name" name="last_name" type="text" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <!-- Middle Name -->
                        <div>
                            <label for="middle_name"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Middle
                                Name</label>
                            <div class="mt-2">
                                <input id="middle_name" name="middle_name" type="text"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <!-- Contact Number -->
                        <div>
                            <label for="contact_number"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Contact
                                Number</label>
                            <div class="mt-2">
                                <input id="contact_number" name="contact_number" type="text" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <!-- Birthdate -->
                        <div>
                            <label for="birthdate"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Birthdate
                                (MM/DD/YY)</label>
                            <div class="mt-2">
                                <input id="birthdate" name="birthdate" type="text" required placeholder="MM/DD/YY"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring -inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <!-- Email -->
                        <div>
                            <label for="email"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Email</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <!-- Gender -->
                        <div>
                            <label for="gender"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Gender</label>
                            <div class="mt-2">
                                <select id="gender" name="gender" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="file"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Upload
                                Valid ID</label>
                            <div class="mt-2">
                                <input id="file" name="file" type="file" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Section -->
                <div>
                    <h3 class="text-lg font-bold leading-6 text-gray-900 dark:text-gray-100 text-center">Address</h3>
                    <div class="mt-4 space-y-6">
                        <!-- Address -->
                        <div>
                            <label for="address"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Address</label>
                            <div class="mt-2">
                                <input id="address" name="address" type="text" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <!-- Country -->
                        <div>
                            <label for="country"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Country</label>
                            <div class="mt-2">
                                <input id="country" name="country" type="text" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <!-- Province -->
                        <div>
                            <label for="province"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Province</label>
                            <div class="mt-2">
                                <input id="province" name="province" type="text" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <!-- City -->
                        <div>
                            <label for="city"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">City</label>
                            <div class="mt-2">
                                <input id="city" name="city" type="text" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <!-- Barangay -->
                        <div>
                            <label for="barangay"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Barangay</label>
                            <div class="mt-2">
                                <input id="barangay" name="barangay" type="text" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <!-- Building Number/Village -->
                        <div>
                            <label for="building_number"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Building
                                Number/Village</label>
                            <div class="mt-2">
                                <input id="building_number" name="building_number" type="text" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Setup Account Section -->
                <div>
                    <h3 class="text-lg font-bold leading-6 text-gray-900 dark:text-gray-100 text-center">Setup Account
                    </h3>
                    <div class="mt-4 space-y-6">
                        <!-- Username -->
                        <div>
                            <label for="username"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Username</label>
                            <div class="mt-2">
                                <input id="username" name="username" type="text" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <!-- Password -->
                        <div>
                            <label for="password"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Password</label>
                            <div class="mt-2">
                                <input id="password" name="password" type="password" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="confirm_password"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Confirm
                                Password</label>
                            <div class="mt-2">
                                <input id="confirm_password" name="confirm_password" type="password" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-4">
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 dark:bg-indigo-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 dark:hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:focus-visible:outline-indigo-400">Create
                        an Account</button>
                </div>
            </form>
        </div>
    </div>
</x-def-layout>
