<?php $__env->startSection('content'); ?>
    <div class="mt-7 p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="border-b-2 border-gray-200">
            <h1 class="pb-2 text-2xl font-semibold dark:text-white">Test Guide</h1>
        </div>
        <div class="mt-5 mb-5 dark:border-gray-700 dark:bg-gray-900">
            <p class="mb-2 text-gray-500 dark:text-gray-400">Jika peserta ingin mengerjakan tes di luar kampus
                Widyatama silahkan ikuti panduan berikut dari poin 1-13 dan jika peserta ingin melakukan tes di
                dalam kampus atau kelas di Universitas Widyatama silahkan lewati panduan sampai ke poin 9.
            </p>
            <div>
                <p class="text-gray-500 dark:text-gray-400">1. Silahkan download file .zip berikut <a
                        href="/docs/getting-started/introduction/"
                        class="text-blue-600 dark:text-blue-500 hover:underline">SEB-WidyatamaLanguageInstitute.zip</a>
                </p>
                <p class="text-gray-500 dark:text-gray-400">2. Extract file<a class="text-gray-950 font-semibold">
                        SEB-WidyatamaLanguageInstitute.zip</a></p>
                <p class="text-gray-500 dark:text-gray-400">3. Install Aplikasi yang bernama<a
                        class="text-gray-950 font-semibold"> SEB_3.4.1.505_SetupBundle.exe</a></p>
                <p class="text-gray-500 dark:text-gray-400">4. Ikuti saja sesuai intruksi pada instalasi aplikasi
                    SEB</p>
                <p class="text-gray-500 dark:text-gray-400">5. Jika sudah klik finish</p>
                <p class="text-gray-500 dark:text-gray-400">6. Install Aplikasi yang bernama<a
                        class="text-gray-950 font-semibold"> SebClientSettings-WidyatamaLanguageInstitute.seb</a>
                </p>
                <p class="text-gray-500 dark:text-gray-400">7. Login</p>
                <p class="text-gray-500 dark:text-gray-400">8. Jika ingin keluar aplikasi SEB silahkan tekan
                    kombinasi<a class="text-gray-950 font-semibold"> CTRL + Q</a></p>
                <p class="text-gray-500 dark:text-gray-400">9. BUY EPT => Bank transfer => Mandiri Payment</p>
                <p class="text-gray-500 dark:text-gray-400">10. Masukan "Company code" dan "Virtual account number"
                    pada link berikut <a href="/docs/getting-started/introduction/"
                        class="text-blue-600 dark:text-blue-500 hover:underline">
                        https://simulator.sandbox.midtrans.com/mandiri/bill/index </a> dengan keterangan "Company
                    code" adalah "Biller Code" dan "Virtual account number" adalah "Bill Key"</p>
                <p class="text-gray-500 dark:text-gray-400">11. Jangan di "reversal"</p>
                <p class="text-gray-500 dark:text-gray-400">12. Setelah selesai silahkan kembali ke halaman dashbord
                    dan silahkan klik tombol "START EPT/TOEIC"</p>
                <p class="text-gray-500 dark:text-gray-400">13. Terakhir silahkan pilih jadwal yang tersedia</p>
            </div>
            <p class="text-gray-500 mt-2 dark:text-gray-400">Jika ada informasi yang kurang jelas silahkan
                hubungi ke email <a href="/docs/getting-started/introduction/"
                    class="text-blue-600 dark:text-blue-500 hover:underline">lembaga.bahasa@widyatama.ac.id</a>
                atau chat yang tersedia dibawah kanan layar anda.</p>
        </div>
        <a href="<?php echo e(url()->previous()); ?>"
            class="py-2.5 px-5 me-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-400 hover:text-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Back</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.userDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\zaldy\OneDrive\Documents\All About Widyatama\Semester 7\MBKM\Project\language-test\resources\views/pages/test-guide.blade.php ENDPATH**/ ?>