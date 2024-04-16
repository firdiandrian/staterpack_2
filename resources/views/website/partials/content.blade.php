<div class="wrapper">

    <!--=================================
     preloader -->

    {{--<div id="pre-loader">--}}
        {{--<img src="{{ asset('static/website/images/pre-loader/loader-06.svg') }}" alt="">--}}
    {{--</div>--}}

    <!--=================================
     preloader -->

    @include('website.partials.header')

    @yield('content')

    @include('website.partials.footer')

</div>

{{-- <div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-angle-up"></i> <span>TOP</span></a></div> --}}