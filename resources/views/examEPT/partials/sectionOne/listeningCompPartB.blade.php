{{-- SECTION ONE - Listening Comperhension Part B --}}
<div id="eptListeningPartB"
    class="hidden p-5 mt-5 bg-white border border-gray-200 rounded-lg shadow max-md:w-full max-md:h-full dark:bg-gray-800 dark:border-gray-700">
    <div class="border-b-2 border-gray-200 dark:border-gray-700">
        <h1 class="pb-2 text-2xl font-semibold dark:text-white">SECTION ONE - Listening Comperhension Part B</h1>
    </div>

    {{-- Direction of Listening Comprehension Part B --}}
    <div class="mt-5">
        <h2 class="pb-2 text-xl font-medium dark:text-white">Direction of Listening Comprehension Part B:</h2>
        <div class="p-3 border-2 border-gray-200 rounded-lg dark:border-gray-700">
            <audio controls>
                @foreach ($enrolls->exam->eptDirection as $direction)
                    @if ($direction->section == 'part b')
                        <source src="{{ asset('storage/' . $direction->audio) }}">
                        Your browser does not support the audio element.
                    @endif
                @endforeach
            </audio>
            @foreach ($enrolls->exam->eptDirection as $direction)
                @if ($direction->section == 'part b')
                    <p class="mt-2">{{ $direction->direction }}</p>
                @endif
            @endforeach
        </div>
    </div>

    {{-- Question List of Listening Comperhension Part B --}}
    <div class="mt-5">
        <h2 class="pb-2 text-xl font-medium dark:text-white">Question List of Listening Comperhension Part B:</h2>
        @php
            $questionNumber = $countPartB + 1;
        @endphp
        @foreach ($enrolls->exam->eptStory as $story)
            @if ($story->section == 'part b')
                @php
                    $storyQuestions = $story->question->count();
                    $lastQuestionNumber = $questionNumber + $storyQuestions - 1;
                @endphp
                <div class="p-3 border-2 border-gray-200 rounded-lg dark:border-gray-700">
                    <h3 class="flex items-center justify-end gap-5 mb-3">
                        @if ($storyQuestions == 1)
                            <div class="text-base text-gray-900 dark:text-white">Audio Story for Number
                                {{ $questionNumber }}</div>
                        @else
                            <div class="text-base text-gray-900 dark:text-white">Audio Story for Number
                                {{ $questionNumber }} -
                                {{ $lastQuestionNumber }}</div>
                        @endif
                        <div>
                            <button type="button" id="playStoryAudio-{{ $story->id }}"
                                onclick="submitStoryAudio('{{ $story->id }}', 'yes')"
                                class="w-10 h-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 -2 13 21">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M1 1.984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L2.506 1.139A1 1 0 0 0 1 1.984Z" />
                                </svg>
                            </button>
                            <button type="button" id="pauseStoryButton-{{ $story->id }}" disabled
                                class="hidden w-10 h-10 text-white bg-gray-400 disabled:cursor-not-allowed focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-full text-sm p-2.5 text-center items-center me-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 -2 11 20">
                                    <path fill-rule="evenodd"
                                        d="M0 .8C0 .358.32 0 .714 0h1.429c.394 0 .714.358.714.8v14.4c0 .442-.32.8-.714.8H.714a.678.678 0 0 1-.505-.234A.851.851 0 0 1 0 15.2V.8Zm7.143 0c0-.442.32-.8.714-.8h1.429c.19 0 .37.084.505.234.134.15.209.354.209.566v14.4c0 .442-.32.8-.714.8H7.857c-.394 0-.714-.358-.714-.8V.8Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <audio id="audioStorySource-{{ $story->id }}"
                                src="{{ asset('storage/' . $story->story) }}"></audio>
                        </div>
                    </h3>
                    @foreach ($story->question as $question)
                        @php
                            $questionNumber++;
                        @endphp
                        <div class="p-3 mb-3 border-2 border-gray-200 rounded-lg dark:border-gray-700">
                            <div class="flex gap-5">
                                <div
                                    class="flex items-center justify-center w-10 h-10 text-base font-medium border-2 border-gray-400 rounded-full">
                                    @php
                                        $countPartB++;
                                    @endphp
                                    <div>{{ $countPartB }}.</div>
                                </div>
                                <div>
                                    <button type="button" id="playQuestionAudio-{{ $question->id }}"
                                        onclick="submitQuestionAudio('{{ $question->id }}', 'yes')"
                                        class="w-10 h-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 -2 13 21">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M1 1.984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L2.506 1.139A1 1 0 0 0 1 1.984Z" />
                                        </svg>
                                    </button>
                                    <button type="button" id="pauseQuestionButton-{{ $question->id }}" disabled
                                        class="hidden w-10 h-10 text-white bg-gray-400 disabled:cursor-not-allowed focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-full text-sm p-2.5 text-center items-center me-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 -2 11 20">
                                            <path fill-rule="evenodd"
                                                d="M0 .8C0 .358.32 0 .714 0h1.429c.394 0 .714.358.714.8v14.4c0 .442-.32.8-.714.8H.714a.678.678 0 0 1-.505-.234A.851.851 0 0 1 0 15.2V.8Zm7.143 0c0-.442.32-.8.714-.8h1.429c.19 0 .37.084.505.234.134.15.209.354.209.566v14.4c0 .442-.32.8-.714.8H7.857c-.394 0-.714-.358-.714-.8V.8Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <audio id="audioQuestionSource-{{ $question->id }}"
                                        src="{{ asset('storage/' . $question->question) }}"></audio>
                                </div>
                                <form>
                                    <div class="flex items-center mb-4">
                                        <input id="ept-answer-{{ $question->id }}-a" type="radio" value="a"
                                            name="answer"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            onClick="submitAndUpdate('{{ $question->id }}', 'a')">
                                        <label for="ept-answer-{{ $question->id }}-a"
                                            class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">{{ $question->answer_a }}</label>
                                    </div>
                                    <div class="flex items-center mb-4">
                                        <input id="ept-answer-{{ $question->id }}-b" type="radio" value="b"
                                            name="answer"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            onClick="submitAndUpdate('{{ $question->id }}', 'b')">
                                        <label for="ept-answer-{{ $question->id }}-b"
                                            class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">{{ $question->answer_b }}</label>
                                    </div>
                                    <div class="flex items-center mb-4">
                                        <input id="ept-answer-{{ $question->id }}-c" type="radio" value="c"
                                            name="answer"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            onClick="submitAndUpdate('{{ $question->id }}', 'c')">
                                        <label for="ept-answer-{{ $question->id }}-c"
                                            class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">{{ $question->answer_c }}</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="ept-answer-{{ $question->id }}-d" type="radio" value="d"
                                            name="answer"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            onClick="submitAndUpdate('{{ $question->id }}', 'd')">
                                        <label for="ept-answer-{{ $question->id }}-d"
                                            class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">{{ $question->answer_d }}</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach
    </div>

    {{-- Footer Navigation --}}
    <div class="flex items-center justify-between pt-3 mt-5 border-t-2 border-gray-200 dark:border-gray-700">
        <button type="button" onclick="backToListeningPartA()"
            class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Prev</button>
        <button type="button" onclick="nextToListeningPartC()"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Next</button>
    </div>
</div>
