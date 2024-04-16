@extends('website.layout')
@section('title')
 Galeri Foto - {{$about->title}}
@stop

@section('content')
    <section class="white-bg page-section-ptb">
        <div class="container-fluid">
            <div class="row justify-content-center">
               <div class="col-lg-8">
                <div class="section-title text-center">
                    <h6>{{@$about->title}}</h6>
                    <h2 class="title-effect">Galeri Foto</h2>
                  </div>
              </div>
            </div>
            <div class="row">
                @if ($models->isEmpty())
                    <h1 class="mx-auto">We are sorry, but its empty</h1>
                @endif
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <div class="isotope columns-4 popup-gallery no-padding">
                        @foreach ($models as $model)
                            <div class="grid-item photography branding">
                                <div class="portfolio-item">
                                    <img src="{{ asset($model->showImage()) }}" alt="">
                                    <div class="portfolio-overlay">
                                        <h4 class="text-white"> <a href="javascript:void(0);"> {{ $model->title }} </a> </h4>
                                        <span class="text-white"> <a href="javascript:void(0);"> {{ str_limit($model->description, 25, '...') }} </a> </span>
                                    </div>
                                    <a class="popup portfolio-img" href="{{ asset($model->showImage()) }}"><i class="fa fa-arrows-alt"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- ================================================ -->

                    <div class="entry-pagination text-center mt-3">
                        <nav aria-label="Page navigation example">
                            {{ $models->links('vendor.pagination.frontend') }}
                        </nav>
                    </div>

                    <!-- ================================================ -->

                </div>
            </div>
        </div>
    </section>

    <!--=================================
    grid -->
@stop