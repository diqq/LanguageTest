<nav class="fixed z-10 w-full bg-white border-gray-200 dark:bg-gray-900 dark:border-b dark:border-gray-950">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <div class="flex items-center">
            <img class="w-20 h-auto" src="{{ asset('img/lembaga-bahasa.png') }}" alt="logo">
        </div>
        @if ($result == false)
            <div class="text-3xl font-semibold text-center dark:text-white">
                <div id="timerDisplay"></div>
            </div>
        @endif
        <button type="button"
            class="toggle-button text-white dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2"
            id="examDarkMode">
            <svg class="w-[18px] h-[18px] text-gray-800 dark:text-white toggle-icon toggle-icon-light"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                <path
                    d="M17.8 13.75a1 1 0 0 0-.859-.5A7.488 7.488 0 0 1 10.52 2a1 1 0 0 0 0-.969A1.035 1.035 0 0 0 9.687.5h-.113a9.5 9.5 0 1 0 8.222 14.247 1 1 0 0 0 .004-.997Z" />
            </svg>
            <svg class="w-[18px] h-[18px] text-gray-800 dark:text-white hidden toggle-icon toggle-icon-dark"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 15a5 5 0 1 0 0-10 5 5 0 0 0 0 10Zm0-11a1 1 0 0 0 1-1V1a1 1 0 0 0-2 0v2a1 1 0 0 0 1 1Zm0 12a1 1 0 0 0-1 1v2a1 1 0 1 0 2 0v-2a1 1 0 0 0-1-1ZM4.343 5.757a1 1 0 0 0 1.414-1.414L4.343 2.929a1 1 0 0 0-1.414 1.414l1.414 1.414Zm11.314 8.486a1 1 0 0 0-1.414 1.414l1.414 1.414a1 1 0 0 0 1.414-1.414l-1.414-1.414ZM4 10a1 1 0 0 0-1-1H1a1 1 0 0 0 0 2h2a1 1 0 0 0 1-1Zm15-1h-2a1 1 0 1 0 0 2h2a1 1 0 0 0 0-2ZM4.343 14.243l-1.414 1.414a1 1 0 1 0 1.414 1.414l1.414-1.414a1 1 0 0 0-1.414-1.414ZM14.95 6.05a1 1 0 0 0 .707-.293l1.414-1.414a1 1 0 1 0-1.414-1.414l-1.414 1.414a1 1 0 0 0 .707 1.707Z" />
            </svg>
        </button>
    </div>
</nav>
