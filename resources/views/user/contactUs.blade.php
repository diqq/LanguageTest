@extends('layouts.userDashboard')
@section('content')
    <div
        class="max-w-screen-lg p-5 mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="border-b-2 border-gray-200 dark:border-gray-700">
            <h1 class="pb-2 text-xl font-semibold dark:text-white">Contact Us</h1>
        </div>
        <section class="mt-5">
            <div class="text-gray-900 dark:text-white">Phone Number : <a class="text-blue-800"
                    href="https://api.whatsapp.com/send?phone=6282118412164&text=Hi%20👋%2C%20I%20have%20some%20questions%20about%20"Widyatama%20University%20Language%20Test%20Application".%20Could%20you%20please%20help%20me%3F%0A%0AMessage%3A"
                    target="_blank">(+62)
                    821-1841-2164</a></div>
            <div class="text-gray-900 dark:text-white">E-Mail Address : <a class="text-blue-800"
                    href="mailto:lembaga.bahasa@widyatama.ac.id">lembaga.bahasa@widyatama.ac.id</a></div>
            <div class="text-gray-900 dark:text-white">Main Website : <a class="text-blue-800 "
                    href="https://lembagabahasa.widyatama.ac.id/">
                    https://lembagabahasa.widyatama.ac.id/</a>
            </div>
            <div class="text-gray-900 dark:text-white">Street Address : Jl. Cikutra no 204 A Bandung Jawa Barat, Indonesia
                40124</div>
            <iframe class="w-full mt-5 rounded-lg"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9390043937838!2d107.64121157486083!3d-6.89789899310133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e797d4ff9d55%3A0x7255df8d69db4d3a!2sUniversitas%20Widyatama!5e0!3m2!1sen!2sid!4v1698723884036!5m2!1sen!2sid"
                width="" height="375" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
    </div>
@endsection
