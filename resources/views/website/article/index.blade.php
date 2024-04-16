@extends('website.layout')

@section('title')
    @if (!empty($kategori->name))
        {{ $kategori->name }}
    @else
        Blog
    @endif
    {{ @$about->title }}
@stop

@section('styles')
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
    <style type="text/css">
        .bulet {
            border-radius: 5%;
        }

        @media (min-width: 768px) {
            .img-cover {
                object-fit: cover;
                height: 250px;
            }
        }
    </style>
@stop

@push('bootstrapStyles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
@endpush

@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>

    <script>
        $("#sharee").jsSocials({
            showLabel: false,
            showCount: false,
            shares: ["twitter", "facebook", "pinterest"]
        });
    </script>
@stop

@section('content')

    <div class=" bg-white container-custom-2 ">
        <h1
            class="mb-4 text-[#64748B] btn-shop text-[14px] lg:pt-32 md:pt-32 sm:pt-32 pt-3 {{ $menu == 'Home' ? 'active' : '' }}">
            <a href="{{ route('article.index') }}" class="text-[#0284C7] text-[14px] btn-home">Home </a><i
                class="fa fa-angle-right"> </i> <a href="{{ route('article.index') }}">Blog</a>
        </h1>
        <div class="lg:flex gap-[101px]">
            <div class="mt-[40px]">
                @if ($article->isEmpty())
                    <div class="lg:w-[920px] justify-center mx-auto mt-80 skelecton">
                        <img class=" justify-center mx-auto" src="{{ asset('static/website/images/empty-gif_1.gif') }}"
                            alt="">
                    </div>
                @endif
                @foreach ($article as $key => $result)
                    <div class="w-">
                        <div class="skelecton">
                            <img class="class-image" src="{{ asset($result->image->sm) }}" alt="{{ $result->title }}">
                        </div>
                        <div class="mt-[24]">
                            <a href="{{ route('article.show', $result->slug) }}"
                                class="text-[#FF00A6] text-[18px] font-semibold  mt-[24] skelecton">
                                {{ $result->category->name }}
                            </a>
                        </div>

                        <div class="text-[#020617] font-mobile-title text-[40px] blog-cater font-root mt-[24] skelecton">
                            <a href="{{ route('article.show', $result->slug) }}">
                                {{ str_limit(strip_tags(@$result->title), 90, ' ...') }}
                            </a>
                        </div>

                        <div class=" flex flex-wrap xl:gap-[28px] md:gap-[28px] sm:gap-[28px] gap-x-6 items-center">
                            <div class="mt-[24] skelecton flex items-center gap-[8px] cursor-default">
                                <i class="fa fa-calendar-o text-[#020617]" style=" font-weight:400;"> </i>
                                <a class="text-[#64748B] text-[14px] font-blog cursor-default" style=" font-weight:400;"
                                    href="javascript:void(0);">
                                    {{ tgl_indo($result->published_at) }}
                                </a>
                            </div>

                            <div class="mt-[24] skelecton flex items-center gap-[8px] cursor-default">
                                <i class="fas fa-eye text-[#020617]" style="font-weight:400;"></i>
                                <span class="text-[#64748B] text-[14px] font-blog cursor-default" style="font-weight:400;">
                                    {{ $result->count_view }} Views
                                </span>
                            </div>

                            <div class="mt-[24] skelecton flex items-center gap-[8px] cursor-pointer"
                                onclick="likePost('{{ $result->id }}')">
                                <i class="far fa-thumbs-up text-[#020617]" style="font-weight:400;"></i>
                                <span class="text-[#64748B] text-[14px] font-blog cursor-default likeCount"
                                    style="font-weight:400;">
                                    {{ $result->count_like }} Likes
                                </span>
                            </div>

                            <div class="mt-[24] skelecton flex items-center gap-[8px] cursor-default">
                                <i class="fas fa-share-alt text-[#020617]" style="font-weight:400;"></i>
                                <span class="text-[#64748B] text-[14px] font-blog cursor-default shareCount"
                                    style="font-weight:400;">
                                    {{ $result->count_share }} Share
                                </span>
                            </div>

                        </div>

                        <div class="mt-[24]">
                            <p class="skelecton">{{ str_limit(strip_tags($result->description), 980, ' ...') }}</p>
                        </div>

                        <div class="flex items-center justify-between mt-[24]">
                            <a href="{{ route('article.show', $result->slug) }}">
                                <button
                                    class=" bg-[#FF00A6] text-white font-semibold rounded-[8px] py-2 px-3 skelecton">Read
                                    More</button>
                            </a>
                            <div class="mt-[24] skelecton flex items-center gap-[8px] cursor-pointer"
                                onclick="sharePost('{{ $result->id }}')">
                                <h1
                                    class="text-[#020617] lg:text-[18px] md:text-[18px] sm:text-[18px] text-[14px] font-bold skelecton">
                                    Share This Post <i class="fas fa-share"></i>
                                </h1>
                            </div>

                        </div>
                        <div class="border-[1px] border-b border-[#CBD5E1] mt-[40px] mb-[60px]"></div>
                    </div>
                @endforeach

                    <script>
                        function likePost(postId) {
                            fetch('/articles/' + postId + '/like', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    }
                                })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Failed to like post');
                                    }
                                    var shareCountElements = document.querySelectorAll('.likeCount');
                                    shareCountElements.forEach(function(element) {
                                        var currentCount = parseInt(element.innerText);
                                        var newCount = currentCount + 1;
                                        element.innerText = newCount + " Like";
                                        console.log('Post liked successfully');
                                    });
                                })
                                .catch(error => {
                                    console.error('Error liking post:', error);
                                });
                        }

                        function sharePost(postId) {
                            fetch('/article/' + postId + '/share', {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}', 
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json',
                                    },
                                })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Failed to share post');
                                    }
                                    var shareCountElements = document.querySelectorAll('.shareCount');
                                    shareCountElements.forEach(function(element) {
                                        var currentCount = parseInt(element.innerText);
                                        var newCount = currentCount + 1;
                                        element.innerText = newCount + " Share";
                                    });
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                                
                           
                    </script>


                {{-- boostarp --}}
                {{-- <div class="row">
                    <div class="col-lg-12 col-md-12 mt-30">
                        {{ $article->links('vendor.pagination.frontend') }}
                    </div>
                </div> --}}
                <div class="flex justify-center mt-[60px] mb-[40px]">
                    {{ $article->links() }}
                </div>
                {{-- end --}}

            </div>

            <div class="mt-[24px]">
                {{-- categories --}}
                <div>
                    <h1 class="font-root text-[#020617] text-[40px] mb-5 skelecton">Categories</h1>
                    @foreach ($categoryArticles as $categoryArticle)
                        <ul class=" mb-3">
                            <li
                                class=" inline-block text-[#64748B] pb-1 text-[18px] blog-deskripsi hover:font-bold hover:text-[#FF00A6] hover:border-b-[1px] hover:border-b-[#FF00A6]">
                                <a class="skelecton"
                                    href="{{ route('article.category', $categoryArticle->slug) }}">{{ $categoryArticle->name }}</a>
                            </li>
                        </ul>
                    @endforeach
                </div>

                {{-- popular post --}}
                <div class="mt-[80px]">
                    <h1 class="font-root text-[#020617] text-[40px] mb-5 skelecton">Popular Post</h1>
                    @foreach ($recentPosts as $recentPost)
                        <div class=" mb-[30px] ">
                            <div class="flex gap-3">
                                <a href="{{ route('article.show', $recentPost->slug) }}">
                                    <div class="skelecton">
                                        <img class="recent-post" src="{{ asset($recentPost->image->sm) }}" alt="">
                                    </div>
                                </a>
                                <div class="w-[230px]">
                                    <a href="{{ route('article.show', $recentPost->slug) }}">
                                        <h1 class="text-[#64748B] skelecton">{{ $recentPost->category->name }}</h1>
                                        <h1 class=" mt-3 font-root text-[18px] root-post skelecton">
                                            {{ str_limit(strip_tags($recentPost->title), 70, ' ...') }}</h1>
                                    </a>
                                </div>
                            </div>
                            <div class="border-b-[1px] border-b-[#CBD5E1] mt-[10px] inline-block"></div>
                        </div>
                    @endforeach
                </div>

                {{-- popular tags --}}
                <div class="mt-[80px] mb-24">
                    <h1 class="font-root text-[#020617] text-[40px] mb-5 skelecton">Popular tags</h1>
                    <div class="flex flex-wrap gap-3 lg:w-[430px] md:w-[430px] sm:w-[430px]">
                        @foreach ($tags as $tag)
                            <a href="{{ route('article.tag', $tag->name) }}"
                                class="bg-[#EEFFFD] hover:bg-[#03666C] text-[#03666C] hover:text-[#FFFFFF] rounded-[8px] p-3 font-bold skelecton cursor-pointer">{{ $tag->name }}</a>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    @stop
