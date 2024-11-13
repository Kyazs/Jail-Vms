<x-layout>
        <div class="flex flex-col p-4">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">PROFILE</h2>
            <div class="bg-gray-100 dark:bg-gray-900 shadow-lg rounded-lg p-6 mb-2">
                <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Personal Information</h3>
                <p class="text-gray-700 dark:text-gray-300"><strong>First Name:</strong> {{$visitor->first_name}} </p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Last Name:</strong> {{$visitor->last_name}} </p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Contact Number:</strong> {{$visitor->contact_number}} </p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Birthdate:</strong> {{$visitor->date_of_birth}} </p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Gender:</strong> {{$visitor->gender_name}} </p>
            </div>
            <div class="bg-gray-100 dark:bg-gray-900 shadow-lg rounded-lg p-6 mb-2">
                <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Address</h3>
                <p class="text-gray-700 dark:text-gray-300"><strong>Country:</strong> Philippines</p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Province:</strong> Zamboanga Del Sur</p>
                <p class="text-gray-700 dark:text-gray-300"><strong>City:</strong> Zamboanga City</p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Barangay:</strong> Lunzuran</p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Building No./Village:</strong> Village A</p>
            </div>
            <div class="bg-gray-100 dark:bg-gray-900 shadow-lg rounded-lg p-6 mb-2">
                <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Account Information</h3>
                <p class="text-gray-700 dark:text-gray-300"><strong>Username:</strong> Kyazs</p>
                <p class="text-gray-700 dark:text-gray-300"><strong>Email Address:</strong> john.casper@gmail.com</p>
            </div>
        </div>
</x-layout>
