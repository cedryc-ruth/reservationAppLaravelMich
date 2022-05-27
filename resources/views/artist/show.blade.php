@extends('layouts.master')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Spectacle en details</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('show.index') }}">Spectacles<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('artist.index') }}">Artistes<span class="lnr lnr-arrow-right"></span></a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Single Artist Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h2>Artiste</h2>
                    </div>
                </div>
            </div>
            <div class="row s_product_inner">
                <div class="col-lg-6 my-2">

                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{ Voyager::image($artist->image) }}" alt="Image de l'artiste">
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3 class="text-lead">{{ $artist->firstname }} {{ $artist->lastname }}</h3>
                        <ul class="my-3">
                            @foreach ($artist->types as $type)
                                <li class="">
                                    <h4><i class="fa-regular fa-circle mx-2"></i>{{ $type->type }}</h4>
                                </li>
                            @endforeach
                        </ul>
                        {{-- <p></p> --}}
                        {{-- <h3>Spectacles liés: </h3>
                        <ul class="my-2">
                            @foreach ($artist_type as $item)
                                @foreach ($item->shows as $show)
                                    <li><h4><i class="fa-regular fa-circle mx-2"></i>{{ $show->title }}</h4></li>
                                @endforeach
                            @endforeach

                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Artist Area =================-->

    <!--================Artist Description Area =================-->
    <section class="product_description_area">
        <div class="container mt-4">
            <h2 class="text-center mb-4">Petite Bio</h2>
            <p>{{ $artist->bio }}</p>
        </div>
    </section>
    <!--================End Artist Description Area =================-->
@endsection
