@extends('layouts.public')
@section('content')
    <div id="alert-3"
        class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="text-sm font-medium ms-3">
            {{ strtoupper($category) }} Certificate is verified as authentic from Language Institute - Widyatama University!
        </div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
            data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @if ($category == 'ept')
        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <section>
                <table id="myTable" class="w-full text-sm text-left text-gray-500 display dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Order Id
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Score Code
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Name
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    First Section Score
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Second Section Score
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Third Section Score
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Score Total
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Date of Test
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $certificate->order_id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $certificate->score_code }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $certificate->user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $certificate->score_first_section }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $certificate->score_second_section }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $certificate->score_third_section }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $certificate->score_total }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $certificate->created_at->format('Y-m-d') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
    @else
        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="border-b-2 border-gray-200 dark:border-gray-700">
                <h1 class="pb-2 text-2xl font-semibold dark:text-white">TOEIC History</h1>
            </div>
            <section class="mt-5">
                <table id="myTable" class="w-full text-sm text-left text-gray-500 display dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Order Id
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Score Code
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Name
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Listening Section Score
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Reading Section Score
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Score Total
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Date of Test
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $certificate->order_id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $certificate->score_code }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $certificate->user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $certificate->score_listening }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $certificate->score_reading }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $certificate->score_total }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $certificate->created_at->format('Y-m-d') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
    @endif
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $("#myTable").DataTable();
        });
    </script>
@endpush
