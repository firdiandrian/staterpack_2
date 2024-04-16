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
            <a href="{{ route('landing.index') }}" class="text-[#0284C7] text-[14px] btn-home">Home </a><i
                class="fa fa-angle-right"> </i> <a href="{{ route('article.index') }}">Blog</a>
        </h1>
        <div class="lg:flex gap-[101px]">
            <div class="mt-[40px]">
                
                {{-- boostarp --}}
                {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
                    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
                    crossorigin="anonymous"> --}}
                <div class="flex justify-center mt-8">
                    {{ $article->links('vendor.pagination.frontend') }}
                </div>
                {{-- end --}}

            </div>

            <div class="mt-[24px]">
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
            </div>
        </div>
    </div>
@stop
