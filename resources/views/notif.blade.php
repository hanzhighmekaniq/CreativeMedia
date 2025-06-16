@if (session('success'))
    <div id="flash-message"
        class="fixed top-20 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-4 py-3 rounded shadow-lg z-50">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div id="flash-message"
        class="fixed top-20 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-4 py-3 rounded shadow-lg z-50">
        {{ session('error') }}
    </div>
@endif

<script>
    // Hilangkan flash message setelah 10 detik
    setTimeout(function() {
        const flash = document.getElementById('flash-message');
        if (flash) {
            flash.style.transition = 'opacity 0.5s ease';
            flash.style.opacity = '0';
            setTimeout(() => flash.remove(), 500); // Hapus dari DOM setelah transisi
        }
    }, 7000); // 10.000 ms = 10 detik
</script>
