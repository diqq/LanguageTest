<div id="eptNav"
    class="w-full p-5 mt-5 bg-white border border-gray-200 rounded-lg shadow max-md:w-full dark:bg-gray-800 dark:border-gray-700">
    <div>
        <h2 class="text-base font-normal">SECTION ONE - Listening Comperhension Part A</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            @foreach ($enrolls->exam->eptQuestion as $question)
                @if ($question->section == 'part a')
                    <button type="button" id="questionNav-{{ $question->id }}"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{ $countPartA++ }}</button>
                @endif
            @endforeach
        </div>
    </div>
    <div class="mt-3">
        <h2 class="text-base font-normal">SECTION ONE - Listening Comperhension Part B</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            @foreach ($enrolls->exam->eptQuestion as $question)
                @if ($question->section == 'part b')
                    @php
                        $countPartB++;
                    @endphp
                    <button type="button" id="questionNav-{{ $question->id }}"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{ $countPartB }}</button>
                @endif
            @endforeach
        </div>
    </div>
    <div class="mt-3">
        <h2 class="text-base font-normal">SECTION ONE - Listening Comperhension Part C</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            @foreach ($enrolls->exam->eptQuestion as $question)
                @if ($question->section == 'part c')
                    @php
                        $countPartC++;
                    @endphp
                    <button type="button" id="questionNav-{{ $question->id }}"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{ $countPartC }}</button>
                @endif
            @endforeach
        </div>
    </div>
    <div class="pt-3 mt-3 border-t border-gray-200 dark:border-gray-700">
        <h2 class="text-base font-normal">SECTION TWO - Structure Expression</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            @foreach ($enrolls->exam->eptQuestion as $question)
                @if ($question->section == 'structure')
                    @php
                        $countStructure++;
                    @endphp
                    <button type="button" id="questionNav-{{ $question->id }}"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{ $countStructure }}</button>
                @endif
            @endforeach
        </div>
    </div>
    <div class="mt-3">
        <h2 class="text-base font-normal">SECTION TWO - Written Expression</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            @foreach ($enrolls->exam->eptQuestion as $question)
                @if ($question->section == 'written')
                    @php
                        $countWritten++;
                    @endphp
                    <button type="button" id="questionNav-{{ $question->id }}"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{ $countWritten }}</button>
                @endif
            @endforeach
        </div>
    </div>
    <div class="pt-3 mt-3 border-t border-gray-200 dark:border-gray-700">
        <h2 class="text-base font-normal">SECTION THREE - Reading Comperhension</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            @foreach ($enrolls->exam->eptQuestion as $question)
                @if ($question->section == 'reading')
                    @php
                        $countReading++;
                    @endphp
                    <button type="button" id="questionNav-{{ $question->id }}"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{ $countReading }}</button>
                @endif
            @endforeach
        </div>
    </div>
</div>
