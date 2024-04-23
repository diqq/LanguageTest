@extends('layouts.adminDashboard')
@section('content')
    <form action="/admin/dashboard/exam/toeic/question/{{ $questions->id }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="flex items-center justify-center">
            <div
                class="w-full max-w-screen-lg p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="border-b-2 border-gray-200 dark:border-gray-700">
                    <h1 class="pb-1 text-2xl font-semibold text-gray-900 dark:text-white">TOEIC Update Question Part
                        {{ strtoupper($questions->section) }}</h1>
                </div>
                @if ($questions->section == 'i')
                    <div class="mt-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Photograph</label>
                        <input id="file_input" type="file" name="photograph" accept="image/*"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        <div class="flex gap-1 mt-2 text-sm text-gray-900 dark:text-white">Stored Photograph:
                            <div class="text-sm text-blue-800">{{ $questions->photograph }}</div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Audio
                            Question</label>
                        <input id="file_input" type="file" name="audio" accept="audio/*"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    </div>
                    <div class="flex gap-1 mt-2 text-sm text-gray-900 dark:text-white">Stored Audio:
                        <div class="text-sm text-blue-800">{{ $questions->audio }}</div>
                    </div>
                @elseif($questions->section == 'ii')
                    <div class="mt-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Audio
                            Question</label>
                        <input id="file_input" type="file" name="audio" accept="audio/*"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    </div>
                    <div class="flex gap-1 mt-2 text-sm text-gray-900 dark:text-white">Stored Audio:
                        <div class="text-sm text-blue-800">{{ $questions->audio }}</div>
                    </div>
                @elseif($questions->section == 'iii')
                    <div class="mt-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Audio
                            Conversation</label>
                        <input id="file_input" type="file" name="audio" accept="audio/*"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    </div>
                    <div class="flex gap-1 mt-2 text-sm text-gray-900 dark:text-white">Stored Audio:
                        <div class="text-sm text-blue-800">{{ $questions->audio }}</div>
                    </div>
                    <div class="mt-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="text-input">Question</label>
                        <input id="text-input" type="text" name="question" value="{{ $questions->question }}" required
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    </div>
                @elseif($questions->section == 'iv')
                    <div class="mt-5">
                        <label for="select-story"
                            class="block mt-5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                            Story Part IV</label>
                        <select id="select-story" name="story_code" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($stories as $story)
                                @if ($story->section == 'iv')
                                    <option value="{{ $story->story }}"
                                        {{ $story->code == $questions->story_code ? 'selected' : '' }}>{{ $story->story }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="text-input">Question</label>
                        <input id="text-input" type="text" name="question" value="{{ $questions->question }}" required
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    </div>
                @elseif($questions->section == 'v' || $questions->section == 'vi')
                    <div class="mt-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="text-input">Question</label>
                        <textarea id="text-input" name="question" rows="5" value="{{ $questions->question }}" required
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"></textarea>
                    </div>
                @elseif($questions->section == 'vii')
                    <div class="mt-5">
                        <label for="select-story"
                            class="block mt-5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                            Story Part VII</label>
                        <select id="select-story" name="story_code" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($stories as $story)
                                @if ($story->section == 'vii')
                                    <option value="{{ $story->story }}"
                                        {{ $story->code == $questions->story_code ? 'selected' : '' }}>
                                        {!! $story->story !!}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="text-input">Question</label>
                        <input id="text-input" type="text" name="question" value="{{ $questions->question }}" required
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    </div>
                @endif

                @if ($questions->section == 'ii')
                    <div class="mt-5">
                        <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer
                            A</label>
                        <div class="flex items-center gap-3">
                            <input id="radio-1" type="radio" value="a" name="correct_answer"
                                {{ $questions->correct_answer == 'a' ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <input type="text" id="base-input" name="answer_a" placeholder="Enter answer A here"
                                value="{{ $questions->answer_a }}" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <div class="mt-5">
                        <label for="base-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer
                            B</label>
                        <div class="flex items-center gap-3">
                            <input id="radio-1" type="radio" value="b" name="correct_answer"
                                {{ $questions->correct_answer == 'b' ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <input type="text" id="base-input" name="answer_b" placeholder="Enter answer B here"
                                value="{{ $questions->answer_b }}" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <div class="mt-5">
                        <label for="base-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer C</label>
                        <div class="flex items-center gap-3">
                            <input id="radio-1" type="radio" value="c" name="correct_answer"
                                {{ $questions->correct_answer == 'c' ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <input type="text" id="base-input" name="answer_c" placeholder="Enter answer C here"
                                value="{{ $questions->answer_c }}" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                @else
                    <div class="mt-5">
                        <label for="base-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer A</label>
                        <div class="flex items-center gap-3">
                            <input id="radio-1" type="radio" value="a" name="correct_answer"
                                {{ $questions->correct_answer == 'a' ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <input type="text" id="base-input" name="answer_a" placeholder="Enter answer A here"
                                value="{{ $questions->answer_a }}" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <div class="mt-5">
                        <label for="base-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer B</label>
                        <div class="flex items-center gap-3">
                            <input id="radio-1" type="radio" value="b" name="correct_answer"
                                {{ $questions->correct_answer == 'b' ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <input type="text" id="base-input" name="answer_b" placeholder="Enter answer B here"
                                value="{{ $questions->answer_b }}" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <div class="mt-5">
                        <label for="base-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer C</label>
                        <div class="flex items-center gap-3">
                            <input id="radio-1" type="radio" value="c" name="correct_answer"
                                {{ $questions->correct_answer == 'c' ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <input type="text" id="base-input" name="answer_c" placeholder="Enter answer C here"
                                value="{{ $questions->answer_c }}" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                    <div class="pb-5 mt-5 border-b-2 border-gray-200 dark:border-gray-700">
                        <label for="base-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer D</label>
                        <div class="flex items-center gap-3">
                            <input id="radio-1" type="radio" value="d" name="correct_answer"
                                {{ $questions->correct_answer == 'd' ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <input type="text" id="base-input" name="answer_d" placeholder="Enter answer D here"
                                value="{{ $questions->answer_d }}" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>
                @endif

                {{-- Question Condition --}}
                @if ($questions->section === 'i')
                    <input type="hidden" value="1" name="questionCase">
                @elseif ($questions->section === 'ii')
                    <input type="hidden" value="2" name="questionCase">
                @elseif ($questions->section === 'iii')
                    <input type="hidden" value="3" name="questionCase">
                @elseif ($questions->section === 'iv')
                    <input type="hidden" value="4" name="questionCase">
                @elseif ($questions->section === 'v')
                    <input type="hidden" value="5" name="questionCase">
                @elseif ($questions->section === 'vi')
                    <input type="hidden" value="6" name="questionCase">
                @elseif ($questions->section === 'vii')
                    <input type="hidden" value="7" name="questionCase">
                @endif

                <div class="flex items-center mt-5 rounded-b dark:border-gray-600">
                    <button type="button" data-modal-target="create-modal" data-modal-toggle="create-modal"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    <a href="{{ url('/admin/dashboard/exam/' . session('id')) . '/edit' }}"
                        class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</a>
                </div>

                {{-- Update Modal --}}
                <div id="create-modal" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full p-4">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="create-modal">
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
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you
                                    want to Update this Question?</h3>
                                <button data-modal-hide="create-modal" type="submit"
                                    class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                    Yes, I'm sure
                                </button>
                                <button data-modal-hide="create-modal" type="button"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                    cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
