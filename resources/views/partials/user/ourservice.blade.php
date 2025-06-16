<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    inter: ["Inter", "sans-serif"],
                },
                animation: {
                    "gradient-shift": "gradientShift 15s ease infinite",
                    "title-glow": "titleGlow 3s ease-in-out infinite alternate",
                    "card-reveal": "cardReveal 0.8s ease forwards",
                    "float-1": "float1 20s ease-in-out infinite",
                    "float-2": "float2 25s ease-in-out infinite",
                    "float-3": "float3 30s ease-in-out infinite",
                    "float-4": "float4 18s ease-in-out infinite",
                    "float-5": "float5 22s ease-in-out infinite",
                    rotate: "rotate 3s linear infinite",
                    shine: "shine 0.8s ease-in-out",
                },
                backgroundSize: {
                    400: "400% 400%",
                },
            },
        },
    };
</script>

<style>
    @keyframes gradientShift {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    @keyframes titleGlow {
        from {
            filter: drop-shadow(0 0 10px rgba(249, 115, 22, 0.3));
        }

        to {
            filter: drop-shadow(0 0 30px rgba(249, 115, 22, 0.6));
        }
    }

    @keyframes cardReveal {
        from {
            opacity: 0;
            transform: translateY(50px) rotateX(10deg);
        }

        to {
            opacity: 1;
            transform: translateY(0) rotateX(0deg);
        }
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @keyframes shine {
        0% {
            left: -100%;
        }

        100% {
            left: 100%;
        }
    }

    @keyframes float1 {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        25% {
            transform: translateY(-20px) rotate(90deg);
        }

        50% {
            transform: translateY(-40px) rotate(180deg);
        }

        75% {
            transform: translateY(-20px) rotate(270deg);
        }
    }

    @keyframes float2 {

        0%,
        100% {
            transform: translateX(0px) rotate(0deg);
        }

        25% {
            transform: translateX(20px) rotate(-90deg);
        }

        50% {
            transform: translateX(40px) rotate(-180deg);
        }

        75% {
            transform: translateX(20px) rotate(-270deg);
        }
    }

    @keyframes float3 {

        0%,
        100% {
            transform: translate(0px, 0px) rotate(0deg);
        }

        33% {
            transform: translate(-30px, -30px) rotate(120deg);
        }

        66% {
            transform: translate(30px, -15px) rotate(240deg);
        }
    }

    @keyframes float4 {

        0%,
        100% {
            transform: translateY(0px) scale(1);
        }

        50% {
            transform: translateY(-60px) scale(1.2);
        }
    }

    @keyframes float5 {

        0%,
        100% {
            transform: translate(0px, 0px) rotate(0deg);
        }

        20% {
            transform: translate(20px, -20px) rotate(72deg);
        }

        40% {
            transform: translate(-15px, -40px) rotate(144deg);
        }

        60% {
            transform: translate(-40px, -10px) rotate(216deg);
        }

        80% {
            transform: translate(-10px, 20px) rotate(288deg);
        }
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .gradient-text {
        background: linear-gradient(135deg,
                #ffffff 0%,
                #f97316 50%,
                #ea580c 100%);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .floating-shape {
        position: absolute;
        pointer-events: none;
        transition: transform 0.1s ease-out;
    }
</style>

<div
    class="font-inter bg-slate-900     animate-gradient-shift  overflow-x-hidden">

    <section class=" container mx-auto relative py-24 text-center">
        <div class="absolute inset-0 opacity-30">
            <div class="absolute inset-0"
                style="
          background-image: radial-gradient(
              2px 2px at 20px 30px,
              rgba(249, 115, 22, 0.3),
              transparent
            ),
            radial-gradient(
              2px 2px at 40px 70px,
              rgba(15, 23, 42, 0.4),
              transparent
            ),
            radial-gradient(
              1px 1px at 90px 40px,
              rgba(249, 115, 22, 0.5),
              transparent
            ),
            radial-gradient(
              1px 1px at 130px 80px,
              rgba(15, 23, 42, 0.3),
              transparent
            );
          background-size: 150px 150px;
          background-repeat: repeat;
        ">
            </div>
        </div>

        <div class="container mx-auto px-6 max-w-7xl">
            <div class="mb-20 relative">
                <h2
                    class="text-5xl md:text-6xl font-black gradient-text mb-8 uppercase tracking-widest animate-title-glow">
                    Our Services
                </h2>
                <p
                    class="text-xl text-white/80 max-w-4xl mx-auto font-light leading-relaxed animate-[fadeInUp_1s_ease_0.5s_both]">
                    IT & Multimedia Training, Branding & Design, Web Development & Mobile
                    Apps Development
                    <br />
                    <span class="opacity-70 text-lg">Transforming Ideas into Digital Excellence</span>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 perspective-1000">
                <div
                    class="service-card glass-card rounded-3xl p-12 transition-all duration-700 ease-out relative overflow-hidden opacity-0 translate-y-12 animate-[cardReveal_0.8s_ease_0.2s_forwards] group cursor-pointer">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-orange-500/20 to-transparent -translate-x-full group-hover:animate-shine">
                    </div>

                    <div
                        class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-slate-900 via-orange-500 to-orange-600 scale-x-0 group-hover:scale-x-100 transition-transform duration-600 origin-left">
                    </div>

                    <div
                        class="relative w-24 h-24 mx-auto mb-8 bg-gradient-to-br from-slate-900 via-slate-700 to-orange-500 rounded-full flex items-center justify-center text-3xl text-white shadow-2xl shadow-orange-500/30 transition-all duration-600 group-hover:scale-110 group-hover:rotate-y-360 group-hover:shadow-orange-500/50">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-orange-500 via-orange-600 via-slate-900 to-orange-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 animate-rotate -z-10">
                        </div>
                        <i class="fas fa-graduation-cap"></i>
                    </div>

                    <h3
                        class="text-2xl font-bold text-white mb-6 uppercase tracking-wider transition-all duration-300 group-hover:text-orange-500 group-hover:drop-shadow-[0_0_10px_rgba(249,115,22,0.5)]">
                        Course & Trainings
                    </h3>

                    <p
                        class="text-white/80 leading-relaxed mb-6 transition-colors duration-300 group-hover:text-white/95">
                        Kursus & Pelatihan Komputer IT Multimedia dengan biaya terjangkau,
                        serta belajang meliputi bidang studi Digital Marketing, Animasi,
                        Photography, Graphic Design, Interior Design, Arsitektur Design,
                        Web Designer, Programming Web, Akuntansi, Video Editor, dan masih
                        banyak lagi.
                    </p>

                    <div class="flex gap-3 justify-center flex-wrap">
                        <span
                            class="feature-tag bg-orange-500/20 text-orange-500 px-3 py-1 rounded-full text-sm font-medium border border-orange-500/30 transition-all duration-300 group-hover:bg-orange-500/30 group-hover:border-orange-500/50 group-hover:-translate-y-1">
                            ✨ Certified Instructors
                        </span>
                        <span
                            class="feature-tag bg-orange-500/20 text-orange-500 px-3 py-1 rounded-full text-sm font-medium border border-orange-500/30 transition-all duration-300 group-hover:bg-orange-500/30 group-hover:border-orange-500/50 group-hover:-translate-y-1">
                            🎯 Hands-on Practice
                        </span>
                    </div>
                </div>

                <div
                    class="service-card glass-card rounded-3xl p-12 transition-all duration-700 ease-out relative overflow-hidden opacity-0 translate-y-12 animate-[cardReveal_0.8s_ease_0.4s_forwards] group cursor-pointer">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-orange-500/20 to-transparent -translate-x-full group-hover:animate-shine">
                    </div>
                    <div
                        class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-slate-900 via-orange-500 to-orange-600 scale-x-0 group-hover:scale-x-100 transition-transform duration-600 origin-left">
                    </div>

                    <div
                        class="relative w-24 h-24 mx-auto mb-8 bg-gradient-to-br from-slate-900 via-slate-700 to-orange-500 rounded-full flex items-center justify-center text-3xl text-white shadow-2xl shadow-orange-500/30 transition-all duration-600 group-hover:scale-110 group-hover:rotate-y-360 group-hover:shadow-orange-500/50">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-orange-500 via-orange-600 via-slate-900 to-orange-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 animate-rotate -z-10">
                        </div>
                        <i class="fas fa-palette"></i>
                    </div>

                    <h3
                        class="text-2xl font-bold text-white mb-6 uppercase tracking-wider transition-all duration-300 group-hover:text-orange-500 group-hover:drop-shadow-[0_0_10px_rgba(249,115,22,0.5)]">
                        Branding & Design
                    </h3>

                    <p
                        class="text-white/80 leading-relaxed mb-6 transition-colors duration-300 group-hover:text-white/95">
                        Tingkatkan branding Perusahaan Anda dengan Designer yang tepat dan
                        ahli. Kami menyediakan jasa Branding dan Design guna meningkatkan
                        produktivitas media komunikasi dan promosi perusahaan Anda dengan
                        harga yang bersaing serta mengutamakan kualitas desain terbaik.
                    </p>

                    <div class="flex gap-3 justify-center flex-wrap">
                        <span
                            class="feature-tag bg-orange-500/20 text-orange-500 px-3 py-1 rounded-full text-sm font-medium border border-orange-500/30 transition-all duration-300 group-hover:bg-orange-500/30 group-hover:border-orange-500/50 group-hover:-translate-y-1">
                            🎨 Creative Solutions
                        </span>
                        <span
                            class="feature-tag bg-orange-500/20 text-orange-500 px-3 py-1 rounded-full text-sm font-medium border border-orange-500/30 transition-all duration-300 group-hover:bg-orange-500/30 group-hover:border-orange-500/50 group-hover:-translate-y-1">
                            📈 Brand Impact
                        </span>
                    </div>
                </div>

                <div
                    class="service-card glass-card rounded-3xl p-12 transition-all duration-700 ease-out relative overflow-hidden opacity-0 translate-y-12 animate-[cardReveal_0.8s_ease_0.6s_forwards] group cursor-pointer">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-orange-500/20 to-transparent -translate-x-full group-hover:animate-shine">
                    </div>
                    <div
                        class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-slate-900 via-orange-500 to-orange-600 scale-x-0 group-hover:scale-x-100 transition-transform duration-600 origin-left">
                    </div>

                    <div
                        class="relative w-24 h-24 mx-auto mb-8 bg-gradient-to-br from-slate-900 via-slate-700 to-orange-500 rounded-full flex items-center justify-center text-3xl text-white shadow-2xl shadow-orange-500/30 transition-all duration-600 group-hover:scale-110 group-hover:rotate-y-360 group-hover:shadow-orange-500/50">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-orange-500 via-orange-600 via-slate-900 to-orange-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 animate-rotate -z-10">
                        </div>
                        <i class="fas fa-code"></i>
                    </div>

                    <h3
                        class="text-2xl font-bold text-white mb-6 uppercase tracking-wider transition-all duration-300 group-hover:text-orange-500 group-hover:drop-shadow-[0_0_10px_rgba(249,115,22,0.5)]">
                        Web Development
                    </h3>

                    <p
                        class="text-white/80 leading-relaxed mb-6 transition-colors duration-300 group-hover:text-white/95">
                        Jasa pembuatan Website yang Menarik dan Powerful (Company Profile,
                        Toko Online, E-Commerce, Aplikasi Web, Portal Pemerintah, Forum,
                        Komunitas, dll). Dilengkapi dengan fitur SEO (Search Engine
                        Optimizations) yang akan membantu website anda bersaing di halaman
                        pertama Google.
                    </p>

                    <div class="flex gap-3 justify-center flex-wrap">
                        <span
                            class="feature-tag bg-orange-500/20 text-orange-500 px-3 py-1 rounded-full text-sm font-medium border border-orange-500/30 transition-all duration-300 group-hover:bg-orange-500/30 group-hover:border-orange-500/50 group-hover:-translate-y-1">
                            ⚡ Fast Loading
                        </span>
                        <span
                            class="feature-tag bg-orange-500/20 text-orange-500 px-3 py-1 rounded-full text-sm font-medium border border-orange-500/30 transition-all duration-300 group-hover:bg-orange-500/30 group-hover:border-orange-500/50 group-hover:-translate-y-1">
                            📱 Responsive Design
                        </span>
                    </div>
                </div>

                <div
                    class="service-card glass-card rounded-3xl p-12 transition-all duration-700 ease-out relative overflow-hidden opacity-0 translate-y-12 animate-[cardReveal_0.8s_ease_0.8s_forwards] group cursor-pointer">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-orange-500/20 to-transparent -translate-x-full group-hover:animate-shine">
                    </div>
                    <div
                        class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-slate-900 via-orange-500 to-orange-600 scale-x-0 group-hover:scale-x-100 transition-transform duration-600 origin-left">
                    </div>

                    <div
                        class="relative w-24 h-24 mx-auto mb-8 bg-gradient-to-br from-slate-900 via-slate-700 to-orange-500 rounded-full flex items-center justify-center text-3xl text-white shadow-2xl shadow-orange-500/30 transition-all duration-600 group-hover:scale-110 group-hover:rotate-y-360 group-hover:shadow-orange-500/50">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-orange-500 via-orange-600 via-slate-900 to-orange-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 animate-rotate -z-10">
                        </div>
                        <i class="fas fa-mobile-alt"></i>
                    </div>

                    <h3
                        class="text-2xl font-bold text-white mb-6 uppercase tracking-wider transition-all duration-300 group-hover:text-orange-500 group-hover:drop-shadow-[0_0_10px_rgba(249,115,22,0.5)]">
                        Mobile Apps Development
                    </h3>

                    <p
                        class="text-white/80 leading-relaxed mb-6 transition-colors duration-300 group-hover:text-white/95">
                        Konsultasikan dengan kami kebutuhan aplikasi mobile Anda. Dengan
                        adanya aplikasi berbasis mobile (Android dan iOS) Anda dapat
                        menjangkau customer secara luas serta informasi dapat diakses tanpa
                        batas oleh pelanggan karena mudah diakses kapan saja oleh pelanggan
                        setia Anda.
                    </p>

                    <div class="flex gap-3 justify-center flex-wrap">
                        <span
                            class="feature-tag bg-orange-500/20 text-orange-500 px-3 py-1 rounded-full text-sm font-medium border border-orange-500/30 transition-all duration-300 group-hover:bg-orange-500/30 group-hover:border-orange-500/50 group-hover:-translate-y-1">
                            📱 Cross Platform
                        </span>
                        <span
                            class="feature-tag bg-orange-500/20 text-orange-500 px-3 py-1 rounded-full text-sm font-medium border border-orange-500/30 transition-all duration-300 group-hover:bg-orange-500/30 group-hover:border-orange-500/50 group-hover:-translate-y-1">
                            🔒 Secure & Reliable
                        </span>
                    </div>
                </div>
            </div>

            {{-- <div class="mt-20 animate-[fadeInUp_1s_ease_1s_both]">
                <a href="#contact"
                    class="inline-block px-12 py-5 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold uppercase tracking-widest text-lg rounded-full relative overflow-hidden transition-all duration-400 hover:-translate-y-1 hover:scale-105 hover:shadow-2xl hover:shadow-orange-500/50 hover:bg-gradient-to-r hover:from-orange-600 hover:to-red-600 group">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-shine">
                    </div>
                    <span>Get Started Today</span>
                    <i class="fas fa-arrow-right ml-3 transition-transform group-hover:translate-x-1"></i>
                </a>
                <p class="mt-5 text-white/70 text-lg">
                    Ready to transform your business? Let's discuss your project!
                </p>
            </div> --}}
        </div>

        <div class="floating-shapes absolute inset-0 pointer-events-none overflow-hidden">
            <div
                class="floating-shape w-20 h-20 bg-gradient-to-br from-orange-500/10 to-orange-600/10 rounded-full absolute top-[10%] left-[10%] animate-float-1">
            </div>
            <div
                class="floating-shape w-15 h-15 bg-gradient-to-br from-slate-900/10 to-slate-700/10 absolute top-[20%] right-[15%] animate-float-2 rounded-[30%]">
            </div>
            <div
                class="floating-shape w-25 h-25 bg-gradient-to-br from-orange-500/8 to-orange-600/8 absolute bottom-[20%] left-[15%] animate-float-3 rounded-[20%]">
            </div>
            <div
                class="floating-shape w-10 h-10 bg-gradient-to-br from-slate-900/12 to-slate-700/12 rounded-full absolute top-[60%] left-[50%] animate-float-4">
            </div>
            <div
                class="floating-shape w-30 h-30 bg-gradient-to-br from-orange-500/6 to-orange-600/6 absolute bottom-[10%] right-[10%] animate-float-5 rounded-[40%]">
            </div>
        </div>
    </section>

    <script src="script.js"></script>
    </body>
