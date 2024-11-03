<div class="h-full">
    <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
        aria-controls="sidebar-multi-level-sidebar" type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>
    <aside id="sidebar-multi-level-sidebar" class="h-full overflow-y-auto bg-gray-50 dark:bg-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-700">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/admin/dashboard"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/inmate"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 group">
                        <i class="material-icons text-gray-400">gavel</i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Inmates</span>
                    </a>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-600"
                        aria-controls="dropdown-users" data-collapse-toggle="dropdown-users">
                        <i
                            class="material-icons text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">group</i>
                        <span
                            class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap group-hover:text-gray-900 dark:group-hover:text-white">Users</span>
                        <x-ri-arrow-down-s-fill class="w-5 h-5 group-hover:text-gray-900 dark:group-hover:text-white" />
                    </button>
                    <ul id="dropdown-users" class="hidden py-2 space-y-2">
                        <li>
                            <a href="/admin/user/moderator"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-600">Moderator</a>
                        </li>
                        <li>
                            <a href="/admin/user/registered"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-600">Registered
                                Visitors</a>
                        </li>
                        <li>
                            <a href="/admin/user/pending"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-600">Pending
                                Visitors</a>
                        </li>
                        <li>
                            <a href="/admin/user/blacklisted"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-600">Blacklisted
                                Visitors</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-600"
                        aria-controls="dropdown-reports" data-collapse-toggle="dropdown-reports">
                        <i
                            class="material-icons text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">history</i>
                        <span
                            class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap group-hover:text-gray-900 dark:group-hover:text-white">Visit
                            Logs</span>
                        <x-ri-arrow-down-s-fill class="w-5 h-5 group-hover:text-gray-900 dark:group-hover:text-white" />
                    </button>
                    <ul id="dropdown-reports" class="hidden py-2 space-y-2">
                        <li>
                            <a href="/admin/logs/pending"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-600">Pending
                                Visits</a>
                        </li>
                        <li>
                            <a href="/admin/logs/ongoing"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-600">Ongoing
                                Visits</a>
                        </li>
                        <li>
                            <a href="/admin/logs/completed"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-600">Completed
                                Visits</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-600"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <i
                            class="material-icons text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">show_chart</i>
                        <span
                            class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap group-hover:text-gray-900 dark:group-hover:text-white">Reports
                            & Analytics</span>
                        <x-ri-arrow-down-s-fill class="w-5 h-5 group-hover:text-gray-900 dark:group-hover:text-white" />
                    </button>
                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-600">Weekly
                                Visits</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Ongoing
                                Visits</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Completed
                                Visits</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/admin/audit"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 group">
                        <i class="material-icons text-gray-400">description</i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Audit Log</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 group">
                        <i class="material-icons text-gray-400">settings</i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 group">
                        <i class="material-icons text-gray-400">logout</i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    {{ $slot }}
</div>
