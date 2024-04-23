{{-- Part VI - TOEIC Listening --}}
<div id="toeicPartVI"
    class="hidden p-5 mt-5 bg-white border border-gray-200 rounded-lg shadow max-md:w-full max-md:h-full dark:bg-gray-800 dark:border-gray-700">
    <div class="border-b-2 border-gray-200 dark:border-gray-700">
        <h1 class="pb-2 text-2xl font-semibold dark:text-white">PART VI - Listening</h1>
    </div>
    {{-- Direction of Part V - Listening --}}
    <div class="mt-5">
        <h2 class="pb-2 text-xl font-medium dark:text-white">Direction of Listening Part VI:</h2>
        <div class="p-3 border-2 border-gray-200 rounded-lg dark:border-gray-700">
            <audio controls>
                @foreach ($enrolls->exam->toeicDirection as $direction)
                    @if ($direction->section == 'vi')
                        <source src="{{ asset('storage/' . $direction->audio) }}">
                        Your browser does not support the audio element.
                    @endif
                @endforeach
            </audio>
            @foreach ($enrolls->exam->toeicDirection as $direction)
                @if ($direction->section == 'vi')
                    <p class="mt-2">{{ $direction->direction }}</p>
                @endif
            @endforeach
        </div>
    </div>

    {{-- Question of Part VI - Listening --}}
    <div class="mt-5">
        <h2 class="text-xl font-medium text-gray-900 dark:text-white">Question of Listening Part VI:</h2>
        @foreach ($enrolls->exam->toeicQuestion as $question)
            @if ($question->section == 'vi')
                <div class="relative p-2 mt-2 border-2 border-gray-200 rounded-lg dark:border-gray-700">
                    <div class="flex gap-5">
                        <div
                            class="flex items-center justify-center w-10 h-10 text-base font-medium text-gray-900 border-2 border-gray-400 rounded-full dark:text-white">
                            @php
                                $countPartVI++;
                            @endphp
                            <div>{{ $countPartVI }}.</div>
                        </div>
                        <div>
                            <div class="mt-1.5">
                                <p class="text-base text-gray-900 dark:text-white">{{ $question->question }}</p>
                            </div>
                            {{-- Answer --}}
                            <form class="mt-3 ms-1">
                                <div class="flex items-center mb-4">
                                    <input id="toeic-answer-{{ $question->id }}-a" type="radio" value="a"
                                        name="answer"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        onClick="submitAndUpdate('{{ $question->id }}', 'a')">
                                    <label for="toeic-answer-{{ $question->id }}-a"
                                        class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">{{ $question->answer_a }}</label>
                                </div>
                                <div class="flex items-center mb-4">
                                    <input id="toeic-answer-{{ $question->id }}-b" type="radio" value="b"
                                        name="answer"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        onClick="submitAndUpdate('{{ $question->id }}', 'b')">
                                    <label for="toeic-answer-{{ $question->id }}-b"
                                        class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">{{ $question->answer_b }}</label>
                                </div>
                                <div class="flex items-center mb-4">
                                    <input id="toeic-answer-{{ $question->id }}-c" type="radio" value="c"
                                        name="answer"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        onClick="submitAndUpdate('{{ $question->id }}', 'c')">
                                    <label for="toeic-answer-{{ $question->id }}-c"
                                        class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">{{ $question->answer_c }}</label>
                                </div>
                                <div class="flex items-center mb-1">
                                    <input id="toeic-answer-{{ $question->id }}-d" type="radio" value="d"
                                        name="answer"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        onClick="submitAndUpdate('{{ $question->id }}', 'd')">
                                    <label for="toeic-answer-{{ $question->id }}-d"
                                        class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">{{ $question->answer_d }}</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    {{-- Footer Navigation --}}
    <div class="flex items-center justify-between pt-3 mt-5 border-t-2 border-gray-200 dark:border-gray-700">
        <button type="button" onclick="backToPartV()"
            class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Prev</button>
        <button type="button" onclick="nextToPartVII()"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Next</button>
    </div>
</div>
