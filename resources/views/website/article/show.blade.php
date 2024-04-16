@extends('website.layout')
@section('title')
    {{ @$model->title }}
@stop


@section('styles')
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
@stop



@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>

    <script>
        $("#share").jsSocials({
            showLabel: false,
            showCount: false,
            shares: ["twitter", "facebook", "pinterest"]
        });
    </script>
@stop

@section('content')

    {{-- <section class="blog white-bg page-section-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title text-center">
                        <h6>{{ @$about->title }}</h6>
                        <h2 class="title-effect">Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 sm-mb-30">
                    <div class="sidebar-widget">
                        <h6 class="mb-20">Search</h6>
                        <div class="widget-search">
                            <form action="{{ route('article.search') }}" method="get">
                                <i class="fa fa-search"></i>
                                <input type="search" name="slug" class="form-control" placeholder="Search...." />
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <h6 class="mt-40 mb-20">Recent Posts </h6>
                        @foreach ($recentPosts as $recentPost)
                            <div class="recent-post clearfix">
                                <div class="recent-post-image">
                                    <img class="img-fluid" src="{{ asset($recentPost->image->sm) }}"
                                        alt="{{ $recentPost->title }}" title="{{ $recentPost->title }}">
                                </div>
                                <div class="recent-post-info">
                                    <a href="{{ route('article.show', $recentPost->slug) }}">{{ $recentPost->title }}</a>
                                    <span><i class="fa fa-calendar-o"></i>
                                        {{ $recentPost->created_at->format('d F Y') }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="sidebar-widget clearfix">
                        <h6 class="mt-40 mb-20">Category</h6>
                        <ul class="widget-categories">
                            @foreach ($categoryArticles as $categoryArticle)
                                <li><a href="{{ route('article.index', $categoryArticle->slug) }}"><i
                                            class="fa fa-angle-double-right"></i> {{ $categoryArticle->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- ========================== -->
                <div class="col-lg-9">
                    <div class="blog-entry mb-50">
                        <div class="entry-image clearfix">
                            <img class="img-fluid" src="{{ asset($model->image->lg) }}" alt="{{ $model->title }}"
                                title="{{ $model->title }}">
                        </div>
                        <div class="blog-detail">
                            <div class="entry-title mb-10">
                                <a href="javascript:void(0);">{{ $model->title }}</a>
                            </div>
                            <div class="entry-meta mb-10">
                                <ul>
                                    <li><i class="fa fa-folder-open-o"></i> <a
                                            href="{{ route('article.index', $model->category->slug) }}">
                                            {{ $model->category->name }} </a> </li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-user-o"></i> by
                                            {{ @$model->user_id != null ? @$model->user->name : 'admin' }}</a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-calendar-o"></i>
                                            {{ $model->published_at->format('l, d F Y H:i') }}</a></li>
                                </ul>
                            </div>
                            <div class="entry-content text-justify">
                                {!! $model->description !!}
                            </div>
                            <div class="entry-share clearfix">
                                <div class="social list-style-none float-right">
                                    <strong>Share to your friends </strong>
                                    <div id="share"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <div class=" bg-white container-custom-2 ">
        <h1
            class="mb-4 text-[#64748B] btn-shop text-[14px] lg:pt-32 md:pt-32 sm:pt-32 pt-3 {{ $menu == 'Home' ? 'active' : '' }}">
            <a href="{{ route('article.index') }}" class="text-[#0284C7] text-[14px] btn-home">Home </a><i
                class="fa fa-angle-right"> </i> <a href="{{ route('article.index') }}">Blog</a> <i
                class="fa fa-angle-right"> </i> <a
                href="{{ route('article.index', $model->category->slug) }}">{{ $model->category->name }}</a>
        </h1>
        <div class="lg:flex gap-[70px]">
            <div class="mt-[40px]">
                <div class="w-">
                    <div class="skelecton">
                        <img class="class-image" src="{{ asset($model->image->lg) }}" alt="{{ $model->title }}"
                            title="{{ $model->title }}">
                    </div>
                    <div class="mt-[24]">
                        <a href="{{ route('article.index', $model->category->slug) }}"
                            class="text-[#FF00A6] text-[18px] font-semibold  mt-[24] skelecton">
                            {{ $model->category->name }}
                        </a>
                    </div>

                    <div class="text-[#020617] font-mobile-title text-[40px] blog-cater font-root mt-[24] skelecton">
                        <a href="">
                            {{ $model->title }}
                        </a>
                    </div>

                    <div class=" flex gap-[28px] items-center">
                        <div class="mt-[24] skelecton flex items-center gap-[8px] cursor-default">
                            <i class="fa fa-calendar-o text-[#020617]" style=" font-weight:400;"> </i>
                            <a class="text-[#64748B] text-[14px] font-blog cursor-default" style=" font-weight:400;"
                                href="javascript:void(0);">
                                {{ tgl_indo($model->published_at) }}
                            </a>
                        </div>

                        <div class="mt-[24] skelecton flex items-center gap-[8px] cursor-default">
                            <i class="fas fa-eye text-[#020617]" style=" font-weight:400;"> </i>
                            <a class="text-[#64748B] text-[14px] font-blog cursor-default" style=" font-weight:400;"
                                href="javascript:void(0);">
                                {{ $model->count_view }} Views
                            </a>
                        </div>

                        <div class="mt-[24] skelecton flex items-center gap-[8px] cursor-pointer"
                        onclick="likePost('{{ $model->id }}')">
                        <i class="far fa-thumbs-up text-[#020617]" style="font-weight:400;"></i>
                        <span class="text-[#64748B] text-[14px] font-blog cursor-default likeCount"
                            style="font-weight:400;">
                            {{ $model->count_like }} Likes
                        </span>
                    </div>

                    <div class="mt-[24] skelecton flex items-center gap-[8px] cursor-default">
                        <i class="fas fa-share-alt text-[#020617]" style="font-weight:400;"></i>
                        <span class="text-[#64748B] text-[14px] font-blog cursor-default shareCount"
                            style="font-weight:400;">
                            {{ $model->count_share }} Share
                        </span>
                    </div>
                    </div>

                    <div class="mt-[24]">
                        <p class="skelecton">{!! $model->description !!}</p>
                    </div>

                    {{-- {{ route('article.tag', $tag->name) }} --}}
                    {{-- list tags --}}
                    <div class=" flex items-center justify-between mt-[24px]">
                        <div class=" flex items-center gap-[12px]">
                            <i class="fas fa-tag fa-lg text-[19px]" style=" font-weight:400;"></i>
                            <div>
                                @foreach ($model->tags as $tag)
                                    <a class="text-[#475569] text-[18px] tags-list hover:text-[#020617]" href="{{ route('article.tag', $tag->name) }}">
                                        {{ $tag->name }}{{ $loop->last ? '' : ',' }}
                                    </a>
                                @endforeach

                            </div>
                        </div>
                        <div class="mt-[24] skelecton flex items-center gap-[8px] cursor-pointer"
                        onclick="sharePost('{{ $model->id }}')">
                        <h1
                            class="text-[#020617] lg:text-[18px] md:text-[18px] sm:text-[18px] text-[14px] font-bold skelecton">
                            Share This Post <i class="fas fa-share"></i>
                        </h1>
                    </div>
                    </div>
                    

                    <div class="border-[1px] border-b border-[#CBD5E1] mt-[40px] mb-[60px]"></div>
                </div>
            </div>

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
                        
                    copyUrl('{{ route('article.show', $model->slug) }}');
                }
            </script>

            <div class="mt-[24px] mb-4">
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

                <div class="mt-[80px]">
                    <h1 class="font-root text-[#020617] text-[40px] mb-5 skelecton">Popular Post</h1>
                    @foreach ($recentPosts as $recentPost)
                        <div class=" mb-[30px]">
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
                        </div>
                    @endforeach
                </div>

                <div class="mt-[80px] mb-24">
                    <h1 class="font-root text-[#020617] text-[40px] mb-5 skelecton">Popular tags</h1>
                    <div class="flex flex-wrap gap-3 lg:w-[430px] md:w-[430px] sm:w-[430px]">
                        @foreach ($tag_show as $key => $items)
                        <a href="{{ route('article.tag', $items->name) }}"
                                class="bg-[#EEFFFD] hover:bg-[#03666C] text-[#03666C] hover:text-[#FFFFFF] rounded-[8px] p-3 font-bold skelecton cursor-default">{{ $items->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
