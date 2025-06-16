<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body class="bg-slate-100">
    @include('notif')
    {{-- Swipper Js --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    @include('components.user.navbar-user')
    {{ $slot }}

    <footer>
        @include('components.user.footer')
    </footer>


</body>

</html>
