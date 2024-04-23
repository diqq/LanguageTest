<div id="toeicNav"
    class="w-full p-5 mt-5 bg-white border border-gray-200 rounded-lg shadow max-md:w-full dark:bg-gray-800 dark:border-gray-700">
    <div>
        <h2 class="text-base font-normal">Part I - Listening</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            @foreach ($enrolls->exam->toeicQuestion as $question)
                @if ($question->section == 'i')
                    <button type="button" id="questionNav-{{ $question->id }}"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{ $countPartI++ }}</button>
                @endif
            @endforeach
        </div>
    </div>
    <div class="pt-5 mt-5 border-t border-gray-200 dark:border-gray-700">
        <h2 class="text-base font-normal">Part II - Listening</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            @foreach ($enrolls->exam->toeicQuestion as $question)
                @if ($question->section == 'ii')
                    @php
                        $countPartII++;
                    @endphp
                    <button type="button" id="questionNav-{{ $question->id }}"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{ $countPartII }}</button>
                @endif
            @endforeach
        </div>
    </div>
    <div class="pt-5 mt-5 border-t border-gray-200 dark:border-gray-700">
        <h2 class="text-base font-normal">Part III - Listening</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            @foreach ($enrolls->exam->toeicQuestion as $question)
                @if ($question->section == 'iii')
                    @php
                        $countPartIII++;
                    @endphp
                    <button type="button" id="questionNav-{{ $question->id }}"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{ $countPartIII }}</button>
                @endif
            @endforeach
        </div>
    </div>
    <div class="pt-5 mt-5 border-t border-gray-200 dark:border-gray-700">
        <h2 class="text-base font-normal">Part IV - Listening</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            @foreach ($enrolls->exam->toeicQuestion as $question)
                @if ($question->section == 'iv')
                    @php
                        $countPartIV++;
                    @endphp
                    <button type="button" id="questionNav-{{ $question->id }}"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{ $countPartIV }}</button>
                @endif
            @endforeach
        </div>
    </div>
    <div class="pt-5 mt-5 border-t border-gray-200 dark:border-gray-700">
        <h2 class="text-base font-normal">Part V - Reading</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            @foreach ($enrolls->exam->toeicQuestion as $question)
                @if ($question->section == 'v')
                    @php
                        $countPartV++;
                    @endphp
                    <button type="button" id="questionNav-{{ $question->id }}"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{ $countPartV }}</button>
                @endif
            @endforeach
        </div>
    </div>
    <div class="pt-5 mt-5 border-t border-gray-200 dark:border-gray-700">
        <h2 class="text-base font-normal">Part VI - Reading</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            @foreach ($enrolls->exam->toeicQuestion as $question)
                @if ($question->section == 'vi')
                    @php
                        $countPartVI++;
                    @endphp
                    <button type="button" id="questionNav-{{ $question->id }}"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{ $countPartVI }}</button>
                @endif
            @endforeach
        </div>
    </div>
    <div class="pt-5 mt-5 border-t border-gray-200 dark:border-gray-700">
        <h2 class="text-base font-normal">Part VII - Reading</h2>
        <div class="flex flex-wrap gap-1 mt-2">
            @foreach ($enrolls->exam->toeicQuestion as $question)
                @if ($question->section == 'vii')
                    @php
                        $countPartVII++;
                    @endphp
                    <button type="button" id="questionNav-{{ $question->id }}"
                        class="w-10 h-10 text-sm text-gray-500 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{ $countPartVII }}</button>
                @endif
            @endforeach
        </div>
    </div>
</div>
