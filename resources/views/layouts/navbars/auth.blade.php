<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="/" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/default-avatar.png">
            </div>
        </a>
        <a href="/" class="simple-text logo-normal">
            {{ __('HRD Team') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'home') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'karyawan' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'karyawan') }}">
                    <i class="nc-icon nc-badge"></i>
                    <p>{{ __('Karyawan') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
