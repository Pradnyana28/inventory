<div class="container">
    @include('layouts.left-sidebar')

    <div class="page-wrapper">
        @yield('content')
    </div>
</div>

@include('layouts.scripts')