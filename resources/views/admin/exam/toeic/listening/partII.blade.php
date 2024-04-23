{{-- Part II --}}
<div class="mt-5">
    <h2 class="pt-3 text-xl font-medium text-gray-900 border-t-2 border-gray-200 dark:border-gray-700 dark:text-white"
        id="partII">Direction of Listening
        Part II:</h2>
    @if ($directions_ii)
        <div class="relative p-2 mt-2 border-2 border-gray-200 rounded-lg dark:border-gray-700">
            @if ($directions_ii->audio)
                <audio class="mt-2 mb-2" controls>
                    <source src="{{ asset('storage/' . $directions_ii->audio) }}">
                    Your browser does not support the audio element.
                </audio>
            @endif
            <p class="text-base text-gray-900 dark:text-white">{{ $directions_ii->direction }}</p>
            {{-- Actions --}}
            <div class="absolute top-3 right-3">
                <button type="button" data-modal-target="delete-direction-{{ $directions_ii->id }}"
                    data-modal-toggle="delete-direction-{{ $directions_ii->id }}"
                    data-bs-target="#delete-direction-{{ $directions_ii->id }}"
                    class="inline-flex items-center px-2 py-2 text-sm font-medium text-center text-white bg-white border border-red-200 rounded-lg hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-600 dark:bg-red-800 dark:border-red-700 dark:text-white dark:hover:bg-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white fill-red-700 dark:fill-white"
                        viewBox="0 0 24 24">
                        <path
                            d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
                        </path>
                        <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                    </svg>
                </button>
                <a href="/admin/dashboard/exam/toeic/direction/{{ $directions_ii->id }}/edit"
                    onclick="updateLocalStorage('part ii')"
                    class="inline-flex items-center px-2 py-2 text-xs font-medium text-center text-white bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-white dark:border-gray-700 dark:focus:ring-gray-700 dark:text-white dark:hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white fill-blue-700 dark:fill-blue-600"
                        viewBox="0 0 24 24">
                        <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z">
                        </path>
                        <path
                            d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z">
                        </path>
                    </svg>
                </a>
                {{-- Delete Modal --}}
                <div id="delete-direction-{{ $directions_ii->id }}" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full p-4">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="delete-direction-{{ $directions_ii->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 text-center md:p-5">
                                <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-500 dark:text-gray-400">
                                    Are you
                                    sure want to delete this Direction?</h3>
                                <div class="mt-1 mb-5">
                                    <p class="font-normal leading-relaxed text-gray-500 dark:text-gray-400">
                                        This action is irreversible and will lead to the removal of
                                        Direction forever from the system.
                                    </p>
                                </div>
                                <form class="flex justify-center "
                                    action="/admin/dashboard/exam/toeic/direction/{{ $directions_ii->id }}"
                                    method="POST">
                                    @method('delete')
                                    @csrf
                                    <button data-modal-hide="delete-direction-{{ $directions_ii->id }}" type="submit"
                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                        Yes, I'm sure
                                    </button>
                                    <button data-modal-hide="delete-direction-{{ $directions_ii->id }}" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                        cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="p-2 mt-2 text-gray-900 border-2 border-gray-200 rounded-lg dark:text-white dark:border-gray-700">
            No direction of this part has been created.
        </div>
    @endif
</div>
<div class="mt-3">
    <div class="flex items-center">
        <h2 class="text-xl font-medium text-gray-900 dark:text-white">Question of Listening Part II:</h2>
        <span
            class="inline-flex items-center justify-center w-6 h-6 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full ms-2">
            {{ $questions_ii->count() }}
        </span>
    </div>
    @if ($questions_ii->isNotEmpty())
        @foreach ($questions_ii as $question)
            <div class="relative p-2 mt-2 border-2 border-gray-200 rounded-lg dark:border-gray-700">
                <div class="flex gap-5">
                    <div
                        class="flex items-center justify-center w-10 h-10 text-base font-medium text-gray-900 border-2 border-gray-400 rounded-full dark:text-white">
                        @php
                            $countPartII++;
                        @endphp
                        <div>{{ $countPartII }}.</div>
                    </div>
                    <div>
                        <div class="mt-1.5">
                            <audio class="-mt-1.5" controls>
                                <source src="{{ asset('storage/' . $question->audio) }}">
                                Your browser does not support the audio element.
                            </audio>
                            <p class="text-base text-gray-900 dark:text-white">
                                {{ $question->question }}
                            </p>
                        </div>
                        {{-- Answer --}}
                        <div class="mt-3 ms-1">
                            <div class="flex items-center mb-4">
                                <input id="radio-a" type="radio" disabled
                                    {{ $question->correct_answer == 'a' ? 'checked' : '' }}
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="radio-a"
                                    class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">{{ $question->answer_a }}</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="radio-b" type="radio" disabled
                                    {{ $question->correct_answer == 'b' ? 'checked' : '' }}
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="radio-b"
                                    class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">{{ $question->answer_b }}</label>
                            </div>
                            <div class="flex items-center">
                                <input id="radio-c" type="radio" disabled
                                    {{ $question->correct_answer == 'c' ? 'checked' : '' }}
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="radio-c"
                                    class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">{{ $question->answer_c }}</label>
                            </div>
                        </div>
                    </div>
                    {{-- Actions --}}
                    <div class="absolute top-3 right-3">
                        <button type="button" data-modal-target="delete-question-{{ $question->id }}"
                            data-modal-toggle="delete-question-{{ $question->id }}"
                            data-bs-target="#delete-question-{{ $question->id }}"
                            class="inline-flex items-center px-2 py-2 text-sm font-medium text-center text-white bg-white border border-red-200 rounded-lg hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-600 dark:bg-red-800 dark:border-red-700 dark:text-white dark:hover:bg-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 text-white fill-red-700 dark:fill-white" viewBox="0 0 24 24">
                                <path
                                    d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
                                </path>
                                <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                            </svg>
                        </button>
                        <a href="/admin/dashboard/exam/toeic/question/{{ $question->id }}/edit"
                            onclick="updateLocalStorage('part ii')"
                            class="inline-flex items-center px-2 py-2 text-xs font-medium text-center text-white bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-white dark:border-gray-700 dark:focus:ring-gray-700 dark:text-white dark:hover:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 text-white fill-blue-700 dark:fill-blue-600" viewBox="0 0 24 24">
                                <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z">
                                </path>
                                <path
                                    d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z">
                                </path>
                            </svg>
                        </a>
                        {{-- Delete Modal --}}
                        <div id="delete-question-{{ $question->id }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full p-4">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="delete-question-{{ $question->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 text-center md:p-5">
                                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h3 class="text-lg font-semibold text-gray-500 dark:text-gray-400">
                                            Are you
                                            sure want to delete this Question?</h3>
                                        <div class="mt-1 mb-5">
                                            <p class="font-normal leading-relaxed text-gray-500 dark:text-gray-400">
                                                This action is irreversible and will lead to the removal of
                                                Question forever from the system.
                                            </p>
                                        </div>
                                        <form class="flex justify-center "
                                            action="/admin/dashboard/exam/toeic/question/{{ $question->id }}"
                                            method="POST">
                                            @method('delete')
                                            @csrf
                                            <button data-modal-hide="delete-question-{{ $question->id }}"
                                                type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="delete-question-{{ $question->id }}"
                                                type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="p-2 mt-2 text-gray-900 border-2 border-gray-200 rounded-lg dark:text-white dark:border-gray-700">
            No question of this part has been created.
        </div>
    @endif
</div>
