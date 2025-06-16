<x-LayoutUser>
    <div class="pt-16 bg-[#0f172a] w-full">

    </div>
    <!-- Hero/Profile Section -->
    <section
        class="relative bg-gradient-to-b from-slate-900 via-slate-800 to-slate-700 pt-24 pb-12 px-4 sm:px-8 lg:px-24 text-white">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-10">
            <div class="flex-1 text-center md:text-left">
                <h1 class="text-4xl sm:text-5xl font-extrabold mb-4 text-orange-500 animate-title-glow">Profil Creative
                    Media</h1>
                <p class="text-lg sm:text-xl text-blue-200 mb-6 max-w-xl">Perusahaan Digital Agency & IT Consultant di
                    Surabaya. Spesialis pelatihan komputer, pengembangan aplikasi web & mobile, branding, dan solusi
                    digital modern.</p>
            </div>
            <div class="flex-1 flex flex-col items-center gap-4">
                <img src="{{ asset('images/logo-remove.png') }}" alt="Creative Media Logo"
                    class="w-40 h-40 object-contain rounded-2xl shadow-2xl bg-white/10 p-4">
                <img src="{{ asset('images/tim-foto.jpg') }}" alt="Tim Creative Media"
                    class="w-64 h-32 object-cover rounded-xl shadow-lg border-4 border-orange-500">
            </div>
        </div>
    </section>

    <!-- Partner/Logo Section -->
    <section class="bg-[#1e293b] py-10 px-4 sm:px-8 lg:px-24">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-wrap justify-center items-center gap-8">
                <img src="{{ asset('images/partner1.png') }}" alt="Partner 1"
                    class="h-16 object-contain grayscale hover:grayscale-0 transition">
                <img src="{{ asset('images/partner2.png') }}" alt="Partner 2"
                    class="h-16 object-contain grayscale hover:grayscale-0 transition">
                <img src="{{ asset('images/partner3.png') }}" alt="Partner 3"
                    class="h-16 object-contain grayscale hover:grayscale-0 transition">
                <img src="{{ asset('images/partner4.png') }}" alt="Partner 4"
                    class="h-16 object-contain grayscale hover:grayscale-0 transition">
                <img src="{{ asset('images/partner5.png') }}" alt="Partner 5"
                    class="h-16 object-contain grayscale hover:grayscale-0 transition">
            </div>
        </div>
    </section>

    <!-- Awards/Prestasi Section -->
    <section class="bg-gradient-to-b from-slate-900 via-slate-800 to-slate-700 py-12 px-4 sm:px-8 lg:px-24">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-2xl sm:text-3xl font-bold text-orange-500 mb-8 text-center">Penghargaan & Prestasi</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-slate-800 rounded-xl p-6 text-center text-white shadow-lg">
                    <img src="{{ asset('images/award-photo1.jpg') }}" alt="Award Photo 1"
                        class="mx-auto h-24 rounded-lg mb-4 object-cover">
                    <p class="text-lg font-semibold mb-2">The Winner "Indonesia Creative Innovative Business Awards
                        2019"</p>
                    <p class="text-blue-200 text-sm">Penghargaan nasional untuk inovasi dan kreativitas di bidang
                        digital agency & IT.</p>
                </div>
                <div class="bg-slate-800 rounded-xl p-6 text-center text-white shadow-lg">
                    <img src="{{ asset('images/award-photo2.jpg') }}" alt="Award Photo 2"
                        class="mx-auto h-24 rounded-lg mb-4 object-cover">
                    <p class="text-lg font-semibold mb-2">Best IT Training Center</p>
                    <p class="text-blue-200 text-sm">Diakui sebagai pusat pelatihan IT terbaik di Surabaya dan
                        sekitarnya.</p>
                </div>
                <div class="bg-slate-800 rounded-xl p-6 text-center text-white shadow-lg">
                    <img src="{{ asset('images/award-photo3.jpg') }}" alt="Award Photo 3"
                        class="mx-auto h-24 rounded-lg mb-4 object-cover">
                    <p class="text-lg font-semibold mb-2">Trusted Partner for Digital Solutions</p>
                    <p class="text-blue-200 text-sm">Dipercaya oleh berbagai instansi dan perusahaan nasional.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni Section -->
    <section class="bg-[#1e293b] py-12 px-4 sm:px-8 lg:px-24">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-2xl sm:text-3xl font-bold text-orange-500 mb-8 text-center">Testimoni Alumni & Klien</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-slate-800 rounded-xl p-6 shadow-lg border-l-4 border-orange-500">
                    <div class="flex items-center mb-4">
                        <img class="w-12 h-12 rounded-full object-cover mr-4 ring-2 ring-orange-500"
                            src="https://i.pravatar.cc/100?img=1" alt="User 1">
                        <div>
                            <p class="font-semibold text-white">Aulia Rahma</p>
                            <p class="text-sm text-gray-400">CEO Startup Lokal</p>
                        </div>
                    </div>
                    <p class="text-gray-300 italic">"Tim ini sangat profesional dan hasil kerja mereka luar biasa.
                        Komunikatif dan responsif dalam setiap tahap proyek."</p>
                </div>
                <div class="bg-slate-800 rounded-xl p-6 shadow-lg border-l-4 border-blue-600">
                    <div class="flex items-center mb-4">
                        <img class="w-12 h-12 rounded-full object-cover mr-4 ring-2 ring-blue-600"
                            src="https://i.pravatar.cc/100?img=3" alt="User 2">
                        <div>
                            <p class="font-semibold text-white">Dimas Setyo</p>
                            <p class="text-sm text-gray-400">Manajer HR</p>
                        </div>
                    </div>
                    <p class="text-gray-300 italic">"Mereka sangat membantu kami dalam pengembangan sistem. Layanan
                        pelanggan juga sangat cepat dan solutif."</p>
                </div>
                <div class="bg-slate-800 rounded-xl p-6 shadow-lg border-l-4 border-orange-500">
                    <div class="flex items-center mb-4">
                        <img class="w-12 h-12 rounded-full object-cover mr-4 ring-2 ring-orange-500"
                            src="https://i.pravatar.cc/100?img=5" alt="User 3">
                        <div>
                            <p class="font-semibold text-white">Nadya Kusuma</p>
                            <p class="text-sm text-gray-400">Digital Marketing</p>
                        </div>
                    </div>
                    <p class="text-gray-300 italic">"Desainnya elegan, pengerjaannya cepat, dan hasil akhir melebihi
                        ekspektasi. Sangat direkomendasikan!"</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Quote/Highlight Section -->
    <section class="bg-gradient-to-r from-orange-500 to-orange-600 py-10 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <blockquote class="text-2xl font-semibold text-white italic">"Tiap bulan 30 hingga 50 orang setiap bulannya
                yang mendaftar untuk mengikuti kursus maupun pelatihan komputer IT & Multimedia di Creative Media."
            </blockquote>
        </div>
    </section>

    <!-- Info Siswa Section -->
    <section class="bg-gradient-to-b from-slate-900 via-slate-800 to-slate-700 py-10 px-4 sm:px-8 lg:px-24 text-white">
        <div class="max-w-6xl mx-auto">
            <p class="text-center text-lg mb-6">Siswa kami datang dari berbagai Daerah, Kota, Pulau yang tersebar di
                Indonesia dan dari Luar Negeri</p>
            <p class="text-blue-200 text-sm text-center max-w-3xl mx-auto">Siswa Creative Media berasal dari berbagai
                latar belakang, mulai dari pelajar, mahasiswa, guru, dosen, karyawan, hingga profesional dari perusahaan
                ternama. Kami bangga menjadi bagian dari perjalanan belajar mereka.</p>
        </div>
    </section>

    <!-- Video Section -->
    <section class="bg-[#1e293b] py-12 px-4 sm:px-8 lg:px-24">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="aspect-w-16 aspect-h-9">
                    <iframe class="rounded-xl w-full h-64" src="https://www.youtube.com/embed/X5T2kf0LBxw"
                        title="YouTube video" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="aspect-w-16 aspect-h-9">
                    <iframe class="rounded-xl w-full h-64" src="https://www.youtube.com/embed/X5T2kf0LBxw"
                        title="YouTube video" frameborder="0" allowfullscreen></iframe>

                </div>
            </div>
        </div>
    </section>

    <!-- Kelas Section -->
    <section class="bg-gradient-to-b from-slate-900 via-slate-800 to-slate-700 py-12 px-4 sm:px-8 lg:px-24">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-2xl sm:text-3xl font-bold text-orange-500 mb-8 text-center">3 Pilihan Kelas, Sesuaikan
                Dengan Kebutuhan Anda</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-slate-800 rounded-xl p-6 text-center text-white shadow-lg">
                    <h3 class="text-xl font-bold text-green-400 mb-2">Regular Class</h3>
                    <ul class="text-blue-200 text-sm space-y-1">
                        <li>Jadwal Fleksibel</li>
                        <li>Materi Lengkap</li>
                        <li>Instruktur Berpengalaman</li>
                        <li>Sertifikat Resmi</li>
                    </ul>
                </div>
                <div class="bg-slate-800 rounded-xl p-6 text-center text-white shadow-lg">
                    <h3 class="text-xl font-bold text-blue-400 mb-2">Inspiration Class</h3>
                    <ul class="text-blue-200 text-sm space-y-1">
                        <li>Mentoring Intensif</li>
                        <li>Studi Kasus Industri</li>
                        <li>Networking Profesional</li>
                        <li>Proyek Kolaboratif</li>
                    </ul>
                </div>
                <div class="bg-slate-800 rounded-xl p-6 text-center text-white shadow-lg">
                    <h3 class="text-xl font-bold text-orange-400 mb-2">Mandiri Class</h3>
                    <ul class="text-blue-200 text-sm space-y-1">
                        <li>Belajar Mandiri</li>
                        <li>Akses Materi Online</li>
                        <li>Support Konsultasi</li>
                        <li>Biaya Terjangkau</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer/Highlight Section -->
    <section class="bg-[#0f172a] py-6 text-center text-green-400 text-lg font-semibold">
        Kami Mempunyai 15 Bidang Studi Unggulan
    </section>
</x-LayoutUser>
