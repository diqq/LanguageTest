@extends('layouts.userDashboard')
@section('content')
    <div class="p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="border-b-2 border-gray-200 dark:border-gray-700">
            <h1 class="pb-2 text-2xl font-semibold dark:text-white">My Purchase</h1>
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
                                Order ID
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Product
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Usage
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Status
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $payment->order_id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ strtoupper($payment->for) }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($payment->used == 'no')
                                    Allowed
                                @else
                                    Not allowed
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ ucfirst($payment->status_pay) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $("#myTable").DataTable();
        });
    </script>
@endpush
