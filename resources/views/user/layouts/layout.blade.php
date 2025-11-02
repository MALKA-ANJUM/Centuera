 
    <!--HEADER INCLUDE-->
    @include('user.layouts.header')

    {{-- toaster --}}
    @include('user.layouts.toster')

    <!--MAIN CONTENT -->
    @yield('content')
    
    <!--FOOTER INCLUDE-->
    @include('user.layouts.footer')