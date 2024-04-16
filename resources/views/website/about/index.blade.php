@extends('website.layout')
@section('title')
Tentang Kami - {{@$about->title}}
@stop

@section('styles')
<style type="text/css">
    @media (min-width: 1200px) {
        .col-lg-1-5 {
            width: 20%;
        }
    }

    @media (min-width: 992px) {
        .col-md-1-5 {
            width: 20%;
        }
    }

    @media (min-width: 768px) {
        .col-sm-1-5 {
            width: 20%;
        }
    }
</style>
@endsection
@section('content')
<section class="page-section-ptb gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="section-title text-center">
                    <h6>{{ @$about->title }}</h6>
                    <h2 class="title-effect">Tentang Kami</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="testimonial bottom_pos light section-title line lef mb-20">
                    <p class="mt-30">{!! @$about->description !!}</p>
                </div>
            </div>
            <div class="col-lg-6 sm-mt-50">
                <div class="clients-list clients-border column-3">
                    <img class="img-fluid" src="{{ @$setting->firstWhere('key','ogimage')->value }}" alt="{{ @$about->title }}" title="{{ @$about->title }}">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="white-bg page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="text-center">
                    <h2 class="mb-30">Klien Kami</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($client as $result)
            <div class="col-md-1-5 col-lg-1-5 col-sm-1-5 col-xs-6 sm-mb-30">
                <div class="team mb-30" style="padding: 0 5px;">
                    <img class="img-fluid mx-auto" src="{{asset($result->image->sm)}}" alt="{{$result->name}}" title="{{$result->name}}">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@stop