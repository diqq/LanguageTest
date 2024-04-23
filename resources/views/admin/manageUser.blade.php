@extends('layouts.adminDashboard')
@section('content')
    <div class="p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="border-b-2 border-gray-200 dark:border-gray-700">
            <h1 class="pb-1 text-2xl font-semibold text-gray-900 dark:text-white">Manage User</h1>
        </div>
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
                                Faculty
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Program Study
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Account Created
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Actions
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getUsers as $getUser)
                        <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <td scope="row" class="px-6 py-4">
                                {{ $getUser->name }}
                            </td>
                            <td scope="row" class="px-6 py-4">
                                {{ $getUser->profile->npm }}
                            </td>
                            <td scope="row" class="px-6 py-4">
                                {{ $getUser->profile->faculty }}
                            </td>
                            <td scope="row" class="px-6 py-4">
                                {{ $getUser->profile->program_study }}
                            </td>
                            <td scope="row" class="px-6 py-4">
                                {{ $getUser->email_verified_at->format('Y-m-d') }}
                            </td>
                            <td scope="row" class="px-6 py-4">
                                <div>
                                    <button type="button" data-modal-target="delete-user-{{ $getUser->id }}"
                                        data-modal-toggle="delete-user-{{ $getUser->id }}"
                                        data-bs-target="#delete-user-{{ $getUser->id }}"
                                        class="inline-flex items-center px-2 py-2 text-sm font-medium text-center text-white bg-white border border-red-200 rounded-lg hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-600 dark:bg-red-800 dark:border-red-700 dark:text-white dark:hover:bg-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5 text-white fill-red-700 dark:fill-white" viewBox="0 0 24 24">
                                            <path
                                                d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
                                            </path>
                                            <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                                        </svg>
                                    </button>
                                    {{-- Delete Modal --}}
                                    <div id="delete-user-{{ $getUser->id }}" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-md max-h-full p-4">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="delete-user-{{ $getUser->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <form action="/admin/dashboard/manage-users/delete/{{ $getUser->id }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="p-4 text-center md:p-5">
                                                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                        <h3 class="text-lg font-semibold text-gray-500 dark:text-gray-400">
                                                            Are you
                                                            sure want to delete this User?</h3>
                                                        <div class="mt-1 mb-5">
                                                            <p
                                                                class="font-normal leading-relaxed text-gray-500 dark:text-gray-400">
                                                                This action is irreversible and will lead to the removal of
                                                                User Account forever from
                                                                the
                                                                system.
                                                            </p>
                                                        </div>
                                                        <button data-modal-hide="delete-user-{{ $getUser->id }}"
                                                            type="submit"
                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                            Yes, I'm sure
                                                        </button>
                                                        <button data-modal-hide="delete-user-{{ $getUser->id }}"
                                                            type="button"
                                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                            cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/admin/dashboard/manage-users/edit/{{ $getUser->id }}"
                                        class="inline-flex items-center px-2 py-2 text-xs font-medium text-center text-white bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-white dark:border-gray-700 dark:text-white dark:hover:bg-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5 text-white fill-blue-700 dark:fill-blue-600" viewBox="0 0 24 24">
                                            <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z">
                                            </path>
                                            <path
                                                d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

    @if (session()->has('success'))
        <div class="fixed bottom-0 z-10 w-full max-w-xs right-5">
            @include('notifications.success')
        </div>
    @elseif(session()->has('failed'))
        <div class="fixed bottom-0 z-10 w-full max-w-xs right-5">
            @include('notifications.failed')
        </div>
    @endif
@endsection
@push('script')
    <script src="{{ asset('js/adminGlobal.js') }}"></script>
@endpush
