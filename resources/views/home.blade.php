<x-LayoutUser>
    <div class="pt-16 bg-[#0f172a] w-full">

    </div>
    <section>
        @include('partials.user.swipper')
    </section>

    <div class="relative z-10 flex justify-center text-center px-4 py-20 bg-gradient-to-t from-slate-900 via-slate-800 to-slate-700 ">
        <div class="max-w-4xl w-full">
            <h1 class="text-3xl sm:text-4xl md:text-5xl xl:text-6xl font-extrabold text-gray-300 mb-6 leading-tight">
                Tingkatkan Skill & Solusi Digital <br class="hidden sm:inline" />Bersama Creative Media
            </h1>
            <p class="text-base sm:text-lg md:text-xl text-gray-300 mb-8 px-2 sm:px-6 md:px-16">
                Kami adalah perusahaan pelatihan komputer serta pengembang aplikasi web & mobile yang siap membantu
                Anda berkembang di era digital.
            </p>
            <div class="flex justify-center gap-4">
                <a href="https://wa.me/6282131314040" target="_blank"
                    class="inline-block bg-blue-800 text-white font-semibold text-sm sm:text-base px-6 py-3 rounded-full hover:bg-orange-500 transition">
                    Hubungi Admin 1
                </a>
                <a href="https://wa.me/6282131310210" target="_blank"
                    class="inline-block bg-blue-800 text-white font-semibold text-sm sm:text-base px-6 py-3 rounded-full hover:bg-orange-500 transition">
                    Hubungi Admin 2
                </a>
            </div>
        </div>
    </div>
    <section>
        @include('partials.user.ourservice')
    </section>
    <section>
        @include('partials.user.support')
    </section>
    <section>
        @include('partials.user.aboutus')
    </section>
    <section>
        @include('partials.user.ourteams')
    </section>
    <section>

        @include('partials.user.testimonials')

    </section>
    <section class="bg-[#0f172a] pb-16 pt-10 px-4 sm:px-6 lg:px-16 text-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold mb-2 text-orange-500">News Update</h2>
            <p class="text-blue-200 mb-10 text-lg">Berita terbaru dan informasi seputar kegiatan dan pengumuman penting.
            </p>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Card 1 -->
                <div
                    class="bg-[#1e293b] rounded-xl shadow-lg overflow-hidden hover:shadow-orange-500/40 transition duration-300">
                    <img src="{{ asset('images/articel1.jpg') }}" alt="News Image" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="text-xl font-semibold text-white mb-2">Judul Berita Pertama</h3>
                        <p class="text-sm text-gray-300 mb-4">Ringkasan isi berita atau deskripsi singkat yang
                            menjelaskan konten berita...</p>
                        <a href="#" class="text-orange-400 hover:underline">Baca selengkapnya →</a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-[#1e293b] rounded-xl shadow-lg overflow-hidden hover:shadow-orange-500/40 transition duration-300">
                    <img src="{{ asset('images/articel2.jpg') }}" alt="News Image" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="text-xl font-semibold text-white mb-2">Judul Berita Kedua</h3>
                        <p class="text-sm text-gray-300 mb-4">Deskripsi ringkas untuk berita kedua yang menampilkan
                            informasi terbaru...</p>
                        <a href="#" class="text-orange-400 hover:underline">Baca selengkapnya →</a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div
                    class="bg-[#1e293b] rounded-xl shadow-lg overflow-hidden hover:shadow-orange-500/40 transition duration-300">
                    <img src="{{ asset('images/articel3.jpg') }}" alt="News Image" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="text-xl font-semibold text-white mb-2">Judul Berita Ketiga</h3>
                        <p class="text-sm text-gray-300 mb-4">Berita ketiga ini bisa berisi pengumuman, liputan
                            kegiatan, atau konten menarik lainnya...</p>
                        <a href="#" class="text-orange-400 hover:underline">Baca selengkapnya →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class=" bg-gradient-to-b from-slate-900 via-slate-800 to-slate-700 text-white py-16 px-4 sm:px-6 lg:px-16">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-orange-500 mb-2">Contact Us</h2>
            <p class="text-blue-200 mb-8 text-lg">
                Silahkan kirimkan pertanyaan / pesan dengan mengisi form singkat di bawah ini, tim kami akan merespon
                dengan cepat!
            </p>

            <form action="#" method="POST" class="space-y-6">
                <!-- Nama -->
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-blue-200">Nama</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-3 rounded-lg bg-[#1e293b] border border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500"
                        placeholder="Masukkan nama Anda" required>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-blue-200">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-3 rounded-lg bg-[#1e293b] border border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500"
                        placeholder="Masukkan email Anda" required>
                </div>

                <!-- Subject -->
                <div>
                    <label for="subject" class="block mb-2 text-sm font-medium text-blue-200">Subject</label>
                    <input type="text" id="subject" name="subject"
                        class="w-full px-4 py-3 rounded-lg bg-[#1e293b] border border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500"
                        placeholder="Judul pesan" required>
                </div>

                <!-- Pesan -->
                <div>
                    <label for="message" class="block mb-2 text-sm font-medium text-blue-200">Pesan</label>
                    <textarea id="message" name="message" rows="5"
                        class="w-full px-4 py-3 rounded-lg bg-[#1e293b] border border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500"
                        placeholder="Tulis pesan Anda di sini..." required></textarea>
                </div>

                <!-- Tombol -->
                <div>
                    <button type="submit"
                        class="bg-orange-500 hover:bg-orange-600 transition duration-300 px-6 py-3 text-white font-semibold rounded-lg shadow-lg">
                        Kirim Pesan
                    </button>
                </div>
            </form>
        </div>
    </section>




</x-LayoutUser>
