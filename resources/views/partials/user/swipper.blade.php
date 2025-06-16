<div class="relative bg-white  overflow-hidden pt-10 pb-20 sm:pt-14 sm:pb-32 md:pt-16 md:pb-40 lg:pt-16 lg:pb-52 xl:pt-20 xl:pb-64">
    <!-- Background image -->
    <div class="absolute inset-0 bg-no-repeat bg-right-top bg-cover z-0 filter brightness-50"
        style="background-image: url('{{ asset('images/office-man.jpeg') }}');">
    </div>



    <div class="swiper w-full container px-4 relative z-10">
        <div class="swiper-wrapper">
            <div class="swiper-slide w-full px-4">
                <div class="aspect-[1080/424] overflow-hidden rounded-xl shadow-lg">
                    <img src="{{ asset('images/test-beranda1.png') }}" class="w-full h-full object-cover" alt="Slide 1" />
                </div>
            </div>
            <div class="swiper-slide w-full px-4">
                <div class="aspect-[1080/424] overflow-hidden rounded-xl shadow-lg">
                    <img src="{{ asset('images/test-beranda2.png') }}" class="w-full h-full object-cover"
                        alt="Slide 2" />
                </div>
            </div>
            <div class="swiper-slide w-full px-4">
                <div class="aspect-[1080/424] overflow-hidden rounded-xl shadow-lg">
                    <img src="{{ asset('images/test-beranda3.png') }}" class="w-full h-full object-cover"
                        alt="Slide 3" />
                </div>
            </div>
        </div>

        <div class="swiper-pagination"></div>

        <!-- Tombol -->
        <div class="absolute left-10 top-1/2 -translate-y-1/2 z-10 cursor-pointer custom-prev">
            <div
                class="w-8 h-8 lg:w-11 lg:h-11 flex items-center justify-center rounded-full bg-slate-500 bg-opacity-90 shadow-md hover:bg-slate-600 transition duration-300">
                <svg class="w-4 h-4 lg:w-5 lg:h-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </div>
        </div>

        <div class="absolute right-10 top-1/2 -translate-y-1/2 z-10 cursor-pointer custom-next">
            <div
                class="w-8 h-8 lg:w-11 lg:h-11 flex items-center justify-center rounded-full bg-slate-500 bg-opacity-90 shadow-md hover:bg-slate-600    transition duration-300">
                <svg class="w-4 h-4 lg:w-5 lg:h-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const swiper = new Swiper(".swiper", {
                loop: true,
                grabCursor: true,
                spaceBetween: 20,
                centeredSlides: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".custom-next",
                    prevEl: ".custom-prev",
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                    },
                    1024: {
                        slidesPerView: 1,
                    },
                },
            });
        });
    </script>
    <!-- SVG Ombak -->
    {{-- <div class="absolute bottom-[-2px] left-0 w-full z-[40]">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0f172a" fill-opacity="1"
                d="M0,32L26.7,37.3C53.3,43,107,53,160,96C213.3,139,267,213,320,208C373.3,203,427,117,480,96C533.3,75,587,117,640,154.7C693.3,192,747,224,800,240C853.3,256,907,256,960,213.3C1013.3,171,1067,85,1120,80C1173.3,75,1227,149,1280,176C1333.3,203,1387,181,1413,170.7L1440,160L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z">
            </path>
        </svg>
    </div> --}}
</div>
