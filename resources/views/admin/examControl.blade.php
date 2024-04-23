@extends('layouts.adminDashboard')
@section('content')
    <div class="flex gap-3">
        <div
            class="p-5 w-2/6 max-h-[580px] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="border-b-2 border-gray-200 dark:border-gray-700">
                <h1 class="pb-1 text-2xl font-semibold dark:text-white">Examination Control</h1>
            </div>
            <div class="mt-5 text-4xl font-semibold text-center dark:text-white" id="timerDisplay"></div>
            <div class="mt-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" id="base-input" disabled value="{{ $examOpen->exam->title }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            @if ($examOpen->date == '0')
                <div class="my-5">
                    <label for="base-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                    <input type="text" id="base-input" disabled
                        value="{{ $examOpen->time == '0' ? 'First Date: ' . \Carbon\Carbon::parse($examOpen->exam->first_date)->translatedFormat('j F Y') . ' (' . $examOpen->exam->first_time . ' WIB)' : ($examOpen->time == '1' ? 'First Date ' . \Carbon\Carbon::parse($examOpen->exam->first_date)->translatedFormat('j F Y') . ' (' . $examOpen->exam->second_time . ' WIB)' : 'First Date: ' . \Carbon\Carbon::parse($examOpen->exam->First_date)->translatedFormat('j F Y') . ' (' . $examOpen->exam->third_time . ' WIB)') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            @elseif ($examOpen->date == '1')
                <div class="my-5">
                    <label for="base-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                    <input type="text" id="base-input" disabled
                        value="{{ $examOpen->time == '0' ? 'Second Date: ' . \Carbon\Carbon::parse($examOpen->exam->second_date)->translatedFormat('j F Y') . ' (' . $examOpen->exam->first_time . ' WIB)' : ($examOpen->time == '1' ? 'Second Date ' . \Carbon\Carbon::parse($examOpen->exam->second_date)->translatedFormat('j F Y') . ' (' . $examOpen->exam->second_time . ' WIB)' : 'Second Date: ' . \Carbon\Carbon::parse($examOpen->exam->second_date)->translatedFormat('j F Y') . ' (' . $examOpen->exam->third_time . ' WIB)') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            @else
                <div class="my-5">
                    <label for="base-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                    <input type="text" id="base-input" disabled
                        value="{{ $examOpen->time == '0' ? 'Third Date: ' . \Carbon\Carbon::parse($examOpen->exam->third_date)->translatedFormat('j F Y') . ' (' . $examOpen->exam->first_time . ' WIB)' : ($examOpen->time == '1' ? 'Third Date ' . \Carbon\Carbon::parse($examOpen->exam->Third_date)->translatedFormat('j F Y') . ' (' . $examOpen->exam->second_time . ' WIB)' : 'Third Date: ' . \Carbon\Carbon::parse($examOpen->exam->third_date)->translatedFormat('j F Y') . ' (' . $examOpen->exam->third_time . ' WIB)') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            @endif
            <div class="mt-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Exam
                    Code</label>
                <input type="text" id="base-input" disabled value="{{ $examOpen->exam_code }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="pb-5 mt-5 border-b-2 border-gray-200 dark:border-gray-700">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number
                    of Question</label>
                <input type="text" id="base-input" disabled value="{{ $examOpen->exam->eptQuestion->count() }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="flex justify-between gap-2 mt-5">
                <div class="flex gap-2">
                    <a href="{{ $examOpen->exam->conference_link }}" target="_blank"
                        class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Conference</a>
                    @if ($examOpen->status == 'run')
                        <button type="button" data-modal-target="end-modal" data-modal-toggle="end-modal"
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">End</button>
                    @else
                        <button type="button" data-modal-target="start-modal" data-modal-toggle="start-modal"
                            class="px-5 py-2.5 text-sm font-medium text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Start</button>
                    @endif
                    {{-- Start Modal --}}
                    <div id="start-modal" tabindex="-1"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full p-4">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="start-modal">
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
                                        want to Start the test?</h3>
                                    <form action="/admin/dashboard/exam/control/{{ $examOpen->id }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" value="{{ $category }}" id="Category">
                                        <input type="hidden" value="{{ $examOpen->id }}" id="Exam-Id">
                                        <input type="hidden" value="run" name="status">
                                        <input type="hidden" value="{{ $examOpen->exam->category }}" name="category">
                                        <button data-modal-hide="start-modal" type="submit"
                                            onclick="postTimer('{{ $examOpen->id }}','{{ $category }}')"
                                            class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                            Yes, I'm sure
                                        </button>
                                        <button data-modal-hide="start-modal" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                            cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- End Modal --}}
                    <div id="end-modal" tabindex="-1"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full p-4">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="end-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 text-center md:p-5">
                                    <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you
                                        want to End the test?</h3>
                                    <form action="/admin/dashboard/exam/control/{{ $examOpen->id }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" value="end" name="status">
                                        <input type="hidden" value="{{ $examOpen->exam->category }}" name="category">
                                        <button data-modal-hide="end-modal" type="submit" id="endButton"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                            Yes, I'm sure
                                        </button>
                                        <button data-modal-hide="end-modal" type="button"
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
        <div class="w-4/6 p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between border-b-2 border-gray-200 dark:border-gray-700">
                <h1 class="pb-1 text-2xl font-semibold dark:text-white">Test Taker List</h1>
                <button type="button" onclick="refreshUser()"
                    class="px-1.5 py-1.5 -mt-1 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg
                        class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.7 7.7A7.1 7.1 0 0 0 5 10.8M18 4v4h-4m-7.7 8.3A7.1 7.1 0 0 0 19 13.2M6 20v-4h4" />
                    </svg>
                </button>
            </div>
            <div>
                <section class="mt-5">
                    <table id="myTable" class="w-full text-sm text-left text-gray-500 display dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        No
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Picture
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Name
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        NPM
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Status
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Action
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($examOpen->exam->enroll as $enroll)
                                @if ($enroll->expired == 'no')
                                    <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700" id="tableRow">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $number++ }}
                                        </th>
                                        <td class="px-6 py-4">
                                            <img class="object-cover w-10 h-10 rounded-full"
                                                src="{{ asset('storage/' . $enroll->user->picture) }}"
                                                alt="profile_picture">
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $enroll->user->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $enroll->user->profile->npm }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ ucfirst($enroll->status) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div>
                                                <button data-modal-target="kick-modal-{{ $enroll->id }}"
                                                    data-modal-toggle="kick-modal-{{ $enroll->id }}"
                                                    class="inline-flex items-center px-2 py-2 text-sm font-medium text-center text-white bg-white border border-red-200 rounded-lg hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-600 dark:bg-red-800 dark:border-red-700 dark:text-white dark:hover:bg-red-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-5 h-5 text-white fill-red-700 dark:fill-white"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z">
                                                        </path>
                                                        <path
                                                            d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div id="kick-modal-{{ $enroll->id }}" tabindex="-1"
                                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-md max-h-full p-4">
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <button type="button"
                                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-hide="kick-modal-{{ $enroll->id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                        <div class="p-4 text-center md:p-5">
                                                            <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 20 20">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                            </svg>
                                                            <h3
                                                                class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                                Are you sure you want to Kick this user?</h3>
                                                            <form
                                                                action="/dashboard/waiting-area/schedule/{{ $enroll->id }}"
                                                                method="POST">
                                                                @method('put')
                                                                @csrf
                                                                <input type="hidden" value="kick" name="status">
                                                                <input type="hidden" value="yes" name="expired">
                                                                <button data-modal-hide="kick-modal-{{ $enroll->id }}"
                                                                    type="submit"
                                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                                    Yes, I'm sure
                                                                </button>
                                                                <button data-modal-hide="kick-modal-{{ $enroll->id }}"
                                                                    type="button"
                                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                                    cancel</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('js/adminGlobal.js') }}"></script>
    <script src="{{ asset('js/examControl.js') }}"></script>
@endpush
