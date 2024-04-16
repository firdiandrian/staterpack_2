<!--=================================
     footer -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v9.0"
    nonce="38L0nXXS"></script>
<!-- {{-- <footer class="footer page-section-pt black-bg">
         <div class="container">
             <div class="row">
                 <div class="col-lg-4 col-sm-4 sm-mb-30">
                     <div class="footer-useful-link footer-hedding">
                         <a href="{{ route('landing.index') }}"><img
                                 src="{{ asset(@$setting->firstWhere('key', 'logo_gray')->value) }}" alt="{{ @$about->title }}"
                                 title="{{ @$about->title }}"> </a>
                         <h6 class="text-white mb-30 text-uppercase"></h6>
                         <ul class="addresss-info">
                             <li><i class="fa fa-map-marker"></i>
                                 <p>{{ @$setting->firstWhere('key', 'address')->value }}</p>
                             </li>
                             <li><i class="fa fa-phone"></i> <a
                                     href="tel:{{ @$setting->firstWhere('key', 'phone')->value }}">
                                     <span>{{ @$setting->firstWhere('key', 'phone')->value }} </span> </a> </li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-4 col-sm-6 xs-mb-30">
                     <div class="fb-page" data-href="https://www.facebook.com/Tata-Griya-Interior-747009022042141/"
                         data-tabs="" data-width="" data-height="" data-small-header="false"
                         data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                         <blockquote cite="https://www.facebook.com/Tata-Griya-Interior-747009022042141/"
                             class="fb-xfbml-parse-ignore"><a
                                 href="https://www.facebook.com/Tata-Griya-Interior-747009022042141/">Tata Griya Interior</a>
                         </blockquote>
                     </div>
                 </div>
                 <div class="col-lg-4 col-sm-6">
                     <h6 class="text-white mb-30 text-uppercase">Dapatkan Penawaran Dari Kami</p>
                         <div class="footer-Newsletter">
                             <form role="form" action="{{ route('subscribe.store') }}" method="post">
                                 {{ csrf_field() }}
                                 @if (Session::has('status'))
                                     <div class="alert alert-{{ session('status') }}" role="alert">
                                         {{ session('message') }}</div>
                                 @endif
                                 @if ($errors->any())
                                     @foreach ($errors->all() as $error)
                                         <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                     @endforeach
                                 @endif
                                 <input class="form-control" type="email" name="email" placeholder="Email address"
                                     required>
                                 <div class="clear">
                                     <button id="submit" name="submit" value="Send" type="submit"
                                         class="button button-border mt-20 form-button"> Get notified </button>
                                 </div>
                             </form>
                         </div>
                 </div>
             </div>
             <div class="footer-widget mt-20">
                 <div class="row">
                     <div class="col-lg-6 col-md-6">
                         <p class="mt-15"> &copy;Copyright <span id="copyright">
                                 <script>
                                     document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                                 </script>
                             </span> {{ @$about->title }} by <a href="" target="_blank">jasa pembuatan
                                 website </a> </p>
                     </div>
                     <div class="col-lg-6 col-md-6 text-left text-md-right">
                         <div class="footer-widget-social">
                             <ul>
                                 @foreach ($SocialMedia as $key => $sosial)
                                     <li><a href="{{ $sosial->url }}" target="_blank" title="{{ $sosial->title }}"><i
                                                 class="fa fa-{{ $sosial->type }}"></i></a>
                                     </li>
                                 @endforeach
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </footer> --}} -->



<footer class="px-4 divide-y bg-[#020617] lg:h-[484px] dark:text-gray-100 down-resue">
    <div class="container-custom-2 flex flex-col justify-between pt-12 mx-auto space-y-8 lg:flex-row">
        <div class="lg:w-1/3 mx-auto lg:mx-0">
            <a rel="noopener noreferrer" href="{{ route('article.index') }}"
                class="flex justify-center space-x-3 lg:justify-start">
                <img src="{{ asset(@$setting->firstWhere('key', 'logo_gray')->value) }}" alt="{{ @$about->title }}"
                    title="{{ @$about->title }}">
            </a>
            <h1 class="text-white text-[18px] font-bold mt-2 lg:text-start text-center">CONTACT US</h1>
            <h2 class="text-[#F1F5F9] text-[12px] font-semibold mt-6 mb-6 lg:text-start text-center">GET IN TOUCH WITH US TODAY! REACH OUT VIA PHONE, EMAIL, OR OUR CONTACT FORM BELOW TO CONNECT WITH OUR TEAM.</h2>

            <fieldset class="lg:w-80 space-y-1 text-white">
                <form class="flex" action="{{ route('subscribe.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="email" name="email" id="price" placeholder="E-mail"
                        class="flex flex-1 border sm:text-sm rounded-l-md focus:ri border-gray-200 text-white bg-[#020617] focus:ri h-12 p-2">
                    <button type="submit" value="Send" name="submit"
                        class="flex items-center px-3 sm:text-sm rounded-r-md bg-gray-200 text-[#020617]"><i
                            class="fa fa-angle-right"></i></button>
                </form>
            </fieldset>

            <div class="col-xl-4 col-lg-4 col-md-6 lg:pt-[100px] pt-12">
                <div
                    class="tp-copyright-social bp-copyright-social text-center lg:text-start tp-copyright-social-two text-lg-end mb-30 text-white flex gap-3 lg:justify-start justify-center">
                    @foreach (@$SocialMedia as $key => $sosial)
                        <a href="{{ @$sosial->url }}" target="_blank" title="{{ @$sosial->title }}"><i
                                class="fab fa-{{ @$sosial->type }}"></i></a>
                    @endforeach
                </div>
            </div>
        </div>
        <div
            class="flex pl-3 lg:gap-40 gaperser space-x-4 sm:space-x-8 md:mx-auto lg:mx-0 mx-auto justify-center pb-5">
            <div class="flex flex-col space-y-4">
                {{-- <h2 class="font-medium text-[#FFFFFF]">Company</h2>
                <div class="flex flex-col space-y-2 text-gray-400 text-sm">
                    @foreach ($page as $pages)
                        @if ($pages->type === 1)
                            <a href="{{ route('page.show', $pages->slug) }}">{{ $pages->title }}</a>
                        @endif
                    @endforeach
                </div> --}}
            </div>

            <div class="flex flex-col space-y-4">
                <h2 class="font-medium text-[#FFFFFF]">Information</h2>
                <div class="flex flex-col space-y-2 text-gray-400 text-sm">
                    {{-- @foreach ($page as $pages)
                        @if ($pages->type === 2)
                            <a href="{{ route('page.show', $pages->slug) }}">{{ $pages->title }}</a>
                        @endif
                    @endforeach --}}
                </div>
            </div>
            <div class="flex flex-col space-y-4">
                <h2 class="font-medium text-[#FFFFFF]">Address</h2>
                <div class="flex flex-col space-y-2 text-sm text-gray-400 wedth-footer w-48">
                    <h1 rel="noopener noreferrer" class=""
                        href="#">{{ @$setting->firstWhere('key', 'address')->value }}</h1>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--=================================
      footer -->
