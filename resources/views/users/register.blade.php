<x-def-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 sm:mx-auto sm:w-full sm:max-w-2xl">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-36 w-auto" src="{{ asset('images/ZCJ-logo.png') }}" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 dark:text-gray-100">
                Create an Account
            </h2>
        </div>
        <div class="mt-10">
            <form class="space-y-6" action="{{ route('register.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf <!-- CSRF token for security -->
                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">Whoops!</strong>
                        <span class="block sm:inline">There were some problems with your input.</span>
                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
                                    value="{{ old('first_name') }}"
                                    class="block w-full rounded-md border-0 px-4 py-2 text-gray-900 dark:text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                                @error('first_name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- Last Name -->
                        <div>
                            <label for="last_name"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Last
                                Name</label>
                            <div class="mt-2">
                                <input id="last_name" name="last_name" type="text" required
                                    value="{{ old('last_name') }}"
                                    class="block w-full rounded-md border-0 px-4 py-2 text-gray-900 dark:text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                                @error('last_name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- Birthdate -->
                        <div>
                            <label for="date_of_birth"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Birthdate
                                (MM/DD/YY)</label>
                            <div class="mt-2">
                                <input id="date_of_birth" name="date_of_birth" type="date" required
                                    value="{{ old('date_of_birth') }}"
                                    class="block w-full rounded-md border-0 px-4 py-2 text-gray-900 dark:text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                                @error('date_of_birth')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- Contact Number -->
                        <div>
                            <label for="contact_number"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Contact
                                Number</label>
                            <div class="mt-2">
                                <input id="contact_number" name="contact_number" type="number" required
                                    value="{{ old('contact_number') }}"
                                    class="block w-full rounded-md border-0 px-4 py-2 text-gray-900 dark:text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                                @error('contact_number')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <label for="email"
                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Email</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" required value="{{ old('email') }}"
                                class="block w-full rounded-md border-0 px-4 py-2 text-gray-900 dark:text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Gender -->
                        <div>
                            <label for="gender_id"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Gender</label>
                            <div class="mt-2">
                                <select id="gender_id" name="gender_id" required
                                    class="block w-full rounded-md border-0 px-4 py-2 text-gray-900 dark:text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                                    <option value="" hidden>Select Gender</option>
                                    <option value="1" {{ old('gender_id') == 'Male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="2" {{ old('gender_id') == 'Female' ? 'selected' : '' }}>Female
                                    </option>
                                    <option value="3" {{ old('gender_id') == 'Other' ? 'selected' : '' }}>Other
                                    </option>
                                </select>
                                @error('gender_id')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- ID Type -->
                        <div>
                            <label for="id_type"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">ID
                                Type</label>
                            <div class="mt-2">
                                <select id="id_type" name="id_type" required
                                    class="block w-full rounded-md border-0 px-4 py-2 text-gray-900 dark:text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                                    <option value="" hidden>Select ID Type</option>
                                    <option value="1" {{ old('id_type') == 'passport' ? 'selected' : '' }}>
                                        Passport</option>
                                    <option value="2" {{ old('id_type') == 'drivers_license' ? 'selected' : '' }}>
                                        Driver's
                                        License</option>
                                    <option value="3" {{ old('id_type') == 'national_id' ? 'selected' : '' }}>
                                        National
                                        ID
                                    </option>
                                    <option value="4" {{ old('id_type') == 'other' ? 'selected' : '' }}>
                                        Other</option>
                                </select>
                                @error('id_type')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="id_document"
                                class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Upload
                                Valid ID</label>
                            <div class="mt-2">
                                <input id="id_document" name="id_document" type="file" required
                                    class="block w-full rounded-md border-0 px-4 py-2 text-gray-900 dark:text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                                @error('id_document')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Address Section -->
        <div class="mt-4">
            <h3 class="text-lg font-bold leading-6 text-gray-900 dark:text-gray-100 text-center">Address</h3>
            <div class="mt-4 space-y-6">
                <!-- Address -->
                <div>
                    <label for="address_street"
                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Street</label>
                    <div class="mt-2">
                        <input id="address_street" name="address_street" type="text" required
                            value="{{ old('address_street') }}"
                            class="block w-full rounded-md border-0 px-4 py-2 text-gray-900 dark:text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                        @error('address_street')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- Country -->
                <div>
                    <label for="country"
                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Country</label>
                    <div class="mt-2">
                        <input id="country" name="country" type="text" required value="{{ old('country') }}"
                            class="block w-full rounded-md border-0 px-4 py-2 text-gray-900 dark:text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                        @error('country')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- Province -->
                <div>
                    <label for="address_province"
                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Province</label>
                    <div class="mt-2">
                        <input id="address_province" name="address_province" type="text" required
                            value="{{ old('address_province') }}"
                            class="block w-full rounded-md border-0 px-4 py-2 text-gray-900 dark:text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                        @error('address_province')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- City -->
                <div>
                    <label for="address_city"
                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">City</label>
                    <div class="mt-2">
                        <input id="address_city" name="address_city" type="text" required
                            value="{{ old('address_city') }}"
                            class="block w-full rounded-md border-0 px-4 py-2 text-gray-900 dark:text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                        @error('address_city')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- Barangay -->
                <div>
                    <label for="address_barangay"
                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Barangay</label>
                    <div class="mt-2">
                        <input id="address_barangay" name="address_barangay" type="text" required
                            value="{{ old('address_barangay') }}"
                            class="block w-full rounded-md border-0 px-4 py-2 text-gray-900 dark:text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                        @error('address_barangay')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- Address Zip -->
                <div>
                    <label for="address_zip"
                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">
                        Zip Code</label>
                    <div class="mt-2">
                        <input id="address_zip" name="address_zip" type="number" required
                            value="{{ old('address_zip') }}"
                            class="block w-full rounded-md border-0 px-4 py-2 text-gray-900 dark:text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                        @error('address_zip')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Setup Account Section -->
        <div class="mt-4">
            <h3 class="text-lg font-bold leading-6 text-gray-900 dark:text-gray-100 text-center">Setup Account
            </h3>
            <div class="mt-4 space-y-6">
                <!-- Username -->
                <div>
                    <label for="username"
                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Username</label>
                    <div class="mt-2">
                        <input id="username" name="username" type="text" required value="{{ old('username') }}"
                            class="block w-full rounded-md border-0 px-4 py-2 text-gray-900 dark:text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                        @error('username')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- Password -->
                <div>
                    <label for="password"
                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Password</label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" required
                            class="block w-full rounded-md border-0 px-4 py-2 text-gray-900 dark:text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="password_confirmation"
                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Confirm
                        Password</label>
                    <div class="mt-2">
                        <input id="confirm_password" name="password_confirmation" type="password" required
                            class="block w-full rounded-md border-0 px-4 py-2 text-gray-900 dark:text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-indigo-400 sm:text-sm sm:leading-6">
                        @error('password_confirmation')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
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
