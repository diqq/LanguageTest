<form action="/admin/dashboard/exam/{{ $exam->id }}" method="POST">
    @method('put')
    @csrf
    <div id="date-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-lg max-h-full p-4">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Date Settings
                    </h3>
                    <button type="button"
                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="date-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 space-y-4 md:p-5">
                    <div class="flex justify-between gap-5">
                        <div class="w-full">
                            <div class="-mt-2">
                                <label for="first-date"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                                    Date</label>
                                <div class="relative max-w-sm">
                                    <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input datepicker datepicker-autohide type="text" id="first-date"
                                        name="first_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="{{ $exam->first_date }}">
                                </div>
                            </div>
                            <div class="mt-5">
                                <label for="second-date"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Second
                                    Date</label>
                                <div class="relative max-w-sm">
                                    <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input datepicker datepicker-autohide type="text" id="second-date"
                                        name="second_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="{{ $exam->second_date }}">
                                </div>
                            </div>
                            <div class="mt-5">
                                <label for="third-date"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Third
                                    Date</label>
                                <div class="relative max-w-sm">
                                    <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input datepicker datepicker-autohide type="text" id="third-date"
                                        name="third_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="{{ $exam->third_date }}">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="-mt-2">
                                <label for="first-time"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                                    Time Slot</label>
                                <div
                                    class="flex gap-1 p-0.5 items-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-48 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <svg class="w-4 h-4 text-gray-500 ms-3 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                    </svg>
                                    <div class="flex items-center gap-1">
                                        <select id="hour" name="hour_1"
                                            class="block text-sm text-gray-900 border-none rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="00" selected>00</option>
                                            @for ($i = 1; $i <= 24; $i++)
                                                <option value="{{ sprintf('%02d', $i) }}"
                                                    {{ sprintf('%02d', $i) == substr($exam->first_time, 0, 2) ? 'selected' : '' }}>
                                                    {{ sprintf('%02d', $i) }}</option>
                                            @endfor
                                        </select>
                                        <div>:</div>
                                        <select id="minute" name="minute_1"
                                            class="block text-sm text-gray-900 border-none rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="00" selected>00</option>
                                            @for ($i = 15; $i <= 45; $i += 15)
                                                <option value="{{ sprintf('%02d', $i) }}"
                                                    {{ sprintf('%02d', $i) == substr($exam->first_time, 3, 2) ? 'selected' : '' }}>
                                                    {{ sprintf('%02d', $i) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <label for="second-time"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Second
                                    Time Slot</label>
                                <div
                                    class="flex gap-1 p-0.5 items-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-48 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <svg class="w-4 h-4 text-gray-500 ms-3 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                    </svg>
                                    <div class="flex items-center gap-1">
                                        <select id="hour" name="hour_2"
                                            class="block text-sm text-gray-900 border-none rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="00" selected>00</option>
                                            @for ($i = 1; $i <= 24; $i++)
                                                <option value="{{ sprintf('%02d', $i) }}"
                                                    {{ sprintf('%02d', $i) == substr($exam->second_time, 0, 2) ? 'selected' : '' }}>
                                                    {{ sprintf('%02d', $i) }}</option>
                                            @endfor
                                        </select>
                                        <div>:</div>
                                        <select id="minute" name="minute_2"
                                            class="block text-sm text-gray-900 border-none rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="00" selected>00</option>
                                            @for ($i = 15; $i <= 45; $i += 15)
                                                <option value="{{ sprintf('%02d', $i) }}"
                                                    {{ sprintf('%02d', $i) == substr($exam->second_time, 3, 2) ? 'selected' : '' }}>
                                                    {{ sprintf('%02d', $i) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <label for="third-time"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Third
                                    Time Slot</label>
                                <div
                                    class="flex gap-1 p-0.5 items-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-48 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <svg class="w-4 h-4 text-gray-500 ms-3 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                    </svg>
                                    <div class="flex items-center gap-1">
                                        <select id="hour" name="hour_3"
                                            class="block text-sm text-gray-900 border-none rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="00" selected>00</option>
                                            @for ($i = 1; $i <= 24; $i++)
                                                <option value="{{ sprintf('%02d', $i) }}"
                                                    {{ sprintf('%02d', $i) == substr($exam->third_time, 0, 2) ? 'selected' : '' }}>
                                                    {{ sprintf('%02d', $i) }}</option>
                                            @endfor
                                        </select>
                                        <div>:</div>
                                        <select id="minute" name="minute_3"
                                            class="block text-sm text-gray-900 border-none rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="00" selected>00</option>
                                            @for ($i = 15; $i <= 45; $i += 15)
                                                <option value="{{ sprintf('%02d', $i) }}"
                                                    {{ sprintf('%02d', $i) == substr($exam->third_time, 3, 2) ? 'selected' : '' }}>
                                                    {{ sprintf('%02d', $i) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="conference-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Conference
                            Link</label>
                        <input type="text" id="conference-input" value="{{ $exam->conference_link }}"
                            name="conference_link"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                    <button data-modal-hide="date-modal" type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    <button data-modal-hide="date-modal" type="button"
                        class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>
