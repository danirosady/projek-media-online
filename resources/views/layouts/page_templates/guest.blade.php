@include('layouts.navbars.navs.guest')

<div class="wrapper wrapper-full-page ">
    <div class="full-page section-image" filter-color="black" data-image="{{ asset('paper') . '/' . ($backgroundImagePath ?? "img/bg/jan-sendereks.jpg") }}">
        @yield('content')
        @include('layouts.footer')
    </div>
</div>
