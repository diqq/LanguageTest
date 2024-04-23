@extends('layouts.exam')
@section('content')
    <div class="flex w-full gap-5 max-md:block">
        @include('partials.testTakerProfile')
        <div
            class="relative w-3/5 p-5 mt-5 bg-white border border-gray-200 rounded-lg shadow h-1/2 max-md:w-full max-md:h-full dark:bg-gray-800 dark:border-gray-700">
            @if ($category == 'ept')
                <div class="border-b-2 border-gray-200 dark:border-gray-700">
                    <h1 class="pb-2 text-2xl font-semibold dark:text-white">EPT Result</h1>
                </div>
                <div class="absolute top-5 right-5">Total EPT Score: <span
                        class="px-2 py-1 text-lg font-semibold text-blue-800 bg-blue-100 rounded me-2 dark:bg-blue-900 dark:text-blue-300">{{ $scores->score_total }}</span>
                </div>
                <div class="p-3 mt-5 border-2 border-gray-200 rounded-lg dark:border-gray-700">
                    <div class="border-b-2 border-gray-200 dark:border-gray-700">
                        <h2 class="pb-2 text-xl font-medium dark:text-white">Listening Comperhension</h2>
                    </div>
                    <div class="mt-3 ms-3">
                        <li>Correct: <b class="text-green-600 dark:text-green-500">{{ $scores->correct_first_section }}</b>
                        </li>
                        <li>Incorrect: <b
                                class="text-red-600 dark:text-red-500">{{ $countFirstSection - $scores->correct_first_section }}</b>
                        </li>
                        <li>Section Score: <b class="text-blue-500">{{ $scores->score_first_section }}</b>
                        </li>
                    </div>
                </div>
                <div class="p-3 mt-3 border-2 border-gray-200 rounded-lg dark:border-gray-700">
                    <div class="border-b-2 border-gray-200 dark:border-gray-700">
                        <h2 class="pb-2 text-xl font-medium dark:text-white">Structure and Written Expression</h2>
                    </div>
                    <div class="mt-3 ms-3">
                        <li>Correct: <b class="text-green-600 dark:text-green-500">{{ $scores->correct_second_section }}</b>
                        </li>
                        <li>Incorrect: <b
                                class="text-red-600 dark:text-red-500">{{ $countSecondSection - $scores->correct_second_section }}</b>
                        </li>
                        <li>Section Score: <b class="text-blue-500">{{ $scores->score_second_section }}</b></li>
                    </div>
                </div>
                <div class="p-3 mt-3 border-2 border-gray-200 rounded-lg dark:border-gray-700">
                    <div class="border-b-2 border-gray-200 dark:border-gray-700">
                        <h2 class="pb-2 text-xl font-medium dark:text-white">Reading Comperhension</h2>
                    </div>
                    <div class="mt-3 ms-3">
                        <li>Correct: <b class="text-green-600 dark:text-green-500">{{ $scores->correct_third_section }}</b>
                        </li>
                        <li>Incorrect: <b
                                class="text-red-600 dark:text-red-500">{{ $countThirdSection - $scores->correct_third_section }}</b>
                        </li>
                        <li>Section Score: <b class="text-blue-500">{{ $scores->score_third_section }}</b></li>
                    </div>
                </div>
            @else
                <div class="border-b-2 border-gray-200 dark:border-gray-700">
                    <h1 class="pb-2 text-2xl font-semibold dark:text-white">TOEIC Result</h1>
                </div>
                <div class="absolute top-5 right-5">Total TOEIC Score: <span
                        class="px-2 py-1 text-lg font-semibold text-blue-800 bg-blue-100 rounded me-2 dark:bg-blue-900 dark:text-blue-300">{{ $scores->score_total }}</span>
                </div>
                <div class="p-3 mt-5 border-2 border-gray-200 rounded-lg dark:border-gray-700">
                    <div class="border-b-2 border-gray-200 dark:border-gray-700">
                        <h2 class="pb-2 text-xl font-medium dark:text-white">Listening Comperhension</h2>
                    </div>
                    <div class="mt-3 ms-3">
                        <li>Correct: <b class="text-green-600 dark:text-green-500">{{ $correctListening }}</b>
                        </li>
                        <li>Incorrect: <b class="text-red-600 dark:text-red-500">{{ $incorrectListening }}</b>
                        </li>
                        <li>Section Score: <b class="text-blue-500">{{ $scores->score_listening }}</b>
                        </li>
                    </div>
                </div>
                <div class="p-3 mt-3 border-2 border-gray-200 rounded-lg dark:border-gray-700">
                    <div class="border-b-2 border-gray-200 dark:border-gray-700">
                        <h2 class="pb-2 text-xl font-medium dark:text-white">Reading Comperhension</h2>
                    </div>
                    <div class="mt-3 ms-3">
                        <li>Correct: <b class="text-green-600 dark:text-green-500">{{ $correctReading }}</b>
                        </li>
                        <li>Incorrect: <b class="text-red-600 dark:text-red-500">{{ $incorrectReading }}</b>
                        </li>
                        <li>Section Score: <b class="text-blue-500">{{ $scores->score_reading }}</b></li>
                    </div>
                </div>
            @endif

            {{-- Footer Navigation --}}
            <div class="flex items-center justify-end gap-3 mt-3">
                <a href="/dashboard/test-history-{{ $category }}"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Print
                    Certificate</a>
                <a href="/dashboard"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Back
                    to Dashboard</a>
            </div>
        </div>
    </div>
@endsection
