<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body class="w-full h-full bg-[#0f172a]">
    @include('notif')

    @include('components.admin.navbar-admin')
    @include('components.admin.sidebar-admin')
    <div class="p-4 sm:ml-64">
        <div class="p-4  mt-14">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
