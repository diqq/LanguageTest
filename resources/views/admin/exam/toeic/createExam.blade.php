@extends('layouts.adminDashboard')
@section('content')
    <div class="flex gap-3">
        <div class="w-1/3">
            <div class="p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between border-b-2 border-gray-200 dark:border-gray-700">
                    <h1 class="pb-1 text-xl font-medium dark:text-white">{{ $exam->title }}</h1>
                    <button type="button" data-modal-target="subname-modal" data-modal-toggle="subname-modal"
                        class="px-3 py-1 -mt-1 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Change</button>
                </div>
                <div class="mt-3">
                    <a href="/admin/dashboard/exam/toeic/direction/create" type="button"
                        class="text-blue-700 w-full hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-white dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                        <div class="flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="m21.781 13.875-2-2.5A1 1 0 0 0 19 11h-6V9h6c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2H5a1 1 0 0 0-.781.375l-2 2.5a1.001 1.001 0 0 0 0 1.25l2 2.5A1 1 0 0 0 5 9h6v2H5c-1.103 0-2 .897-2 2v3c0 1.103.897 2 2 2h6v4h2v-4h6a1 1 0 0 0 .781-.375l2-2.5a1.001 1.001 0 0 0 0-1.25zM4.281 5.5 5.48 4H19l.002 3H5.48L4.281 5.5zM18.52 16H5v-3h13.52l1.2 1.5-1.2 1.5z">
                                </path>
                            </svg>
                            <div>Upload Direction</div>
                        </div>
                    </a>
                    <button type="button" data-modal-target="story-modal" data-modal-toggle="story-modal"
                        class="text-blue-700 mt-1 w-full hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-white dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                        <div class="flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M6 22h15v-2H6.012C5.55 19.988 5 19.805 5 19s.55-.988 1.012-1H21V4c0-1.103-.897-2-2-2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3zM5 8V5c0-.805.55-.988 1-1h13v12H5V8z">
                                </path>
                                <path d="M8 6h9v2H8z"></path>
                            </svg>
                            <div>Upload Story</div>
                        </div>
                    </button>
                    <button type="button" data-modal-target="question-modal" data-modal-toggle="question-modal"
                        class="text-blue-700 mt-1 w-full hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-white dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                        <div class="flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z">
                                </path>
                            </svg>
                            <div>Upload Question</div>
                        </div>
                    </button>
                    <button type="button" data-modal-target="date-modal" data-modal-toggle="date-modal"
                        class="text-blue-700 mt-1 w-full hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-white dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                        <div class="flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z">
                                </path>
                                <path
                                    d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z">
                                </path>
                            </svg>
                            <div>Date Settings</div>
                        </div>
                    </button>
                    {{-- <button type="button"
                        class="text-blue-700 mt-1 w-full hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-white dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                        <div class="flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20.995 6.9a.998.998 0 0 0-.548-.795l-8-4a1 1 0 0 0-.895 0l-8 4a1.002 1.002 0 0 0-.547.795c-.011.107-.961 10.767 8.589 15.014a.987.987 0 0 0 .812 0c9.55-4.247 8.6-14.906 8.589-15.014zM12 19.897C5.231 16.625 4.911 9.642 4.966 7.635L12 4.118l7.029 3.515c.037 1.989-.328 9.018-7.029 12.264z">
                                </path>
                                <path d="m11 12.586-2.293-2.293-1.414 1.414L11 15.414l5.707-5.707-1.414-1.414z"></path>
                            </svg>
                            <div>Test Check</div>
                        </div>
                    </button> --}}
                    @if ($exam->status == 'progress')
                        <button type="button" data-modal-target="publish-modal" data-modal-toggle="publish-modal"
                            class="px-5 py-2.5 mt-1 w-full text-sm font-medium text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Publish</button>
                    @else
                        <button type="button" data-modal-target="publish-modal" data-modal-toggle="publish-modal"
                            class="px-5 py-2.5 mt-1 w-full text-sm font-medium text-white border bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 rounded-lg text-center dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-600 dark:border-gray-600">Unpublish</button>
                    @endif
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-center mt-5 gap-x-5 gap-y-3">
                <a href="#partI"
                    class="w-24 bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">Part
                    Part I</a>
                <a href="#partII"
                    class="w-24 bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">Part
                    Part II</a>
                <a href="#partIII"
                    class="w-24 bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">Part
                    Part III</a>
                <a href="#partIV"
                    class="w-24 bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">Part
                    IV</a>
                <a href="#partV"
                    class="w-24 bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">Part
                    V</a>
                <a href="#partVI"
                    class="w-24 bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">Part
                    VI</a>
                <a href="#partVII"
                    class="w-24 bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">Part
                    VII</a>
            </div>
        </div>
        <div class="w-2/3">
            {{-- Listening Comperhension Section --}}
            <div class="p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="border-b-2 border-gray-200 dark:border-gray-700">
                    <h1 class="pb-1 text-xl font-semibold dark:text-white">Listening Comperhension Section</h1>
                </div>
                @include('admin.exam.toeic.listening.partI')
                @include('admin.exam.toeic.listening.partII')
                @include('admin.exam.toeic.listening.partIII')
                @include('admin.exam.toeic.listening.partIV')
            </div>

            {{-- Reading Comperhension Section --}}
            <div class="p-5 mt-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="border-b-2 border-gray-200 dark:border-gray-700">
                    <h1 class="pb-1 text-xl font-semibold dark:text-white">Reading Comperhension Section</h1>
                </div>
                @include('admin.exam.toeic.reading.partV')
                @include('admin.exam.toeic.reading.partVI')
                @include('admin.exam.toeic.reading.partVII')
            </div>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="fixed z-10 w-full max-w-xs bottom-16 left-5">
            @include('notifications.success')
        </div>
    @elseif(session()->has('failed'))
        <div class="fixed z-10 w-full max-w-xs bottom-16 left-5">
            @include('notifications.failed')
        </div>
    @endif

    @include('admin.exam.partials.questionStored')
    @include('admin.exam.partials.scrollTop')
    @include('admin.exam.partials.subnameModal')
    @include('admin.exam.partials.questionModalTOEIC')
    @include('admin.exam.partials.storyModalTOEIC')
    @include('admin.exam.partials.dateModal')
    @include('admin.exam.partials.publishModal')
@endsection
@push('script')
    <script src="{{ asset('js/adminGlobal.js') }}"></script>
@endpush
