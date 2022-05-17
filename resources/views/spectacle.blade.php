@extends('layouts.master')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Karma e-reservation</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('spectacles') }}">Spectacles<span class="lnr lnr-arrow-right"></span></a>
                        {{-- <a href="{{ route('shop.index') }}">Réservation<span class="lnr lnr-arrow-right"></span></a> --}}
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- start product Area -->
    <section class="owl-carousel active-product-area section_gap">
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Spectacles à l'affiche</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($shows as $show)
                        <div class="col-md-4">
                            <div class="card h-100 text-center">
                                <img src="{{ Voyager::image($show->poster_url) }}" alt="Image d'un show"
                                    class="card-img-top" />
                                <div class="card-body">
                                    <h5 class="card-title">{{ $show->title }}</h5>
                                    <p class="card-text">{{ $show->subtitle }}</p>
                                    <p class="fs-2"><i class="fa-solid fa-calendar-days mx-1"></i>Date(s): <br>
                                        @foreach ($show->representations as $item)
                                            {{ $item->when->translatedFormat('d/M/Y') }} ,
                                        @endforeach
                                    </p>
                                    <p><i class="fa-solid fa-film mx-1"></i>Salle(s) de spectacle:
                                    <ul>
                                        @foreach ($show->representations as $representation)
                                            <li>{{ $representation->location->designation }}</li>
                                        @endforeach
                                    </ul>
                                   


                                    </p>
                                    <p><i class="fa-solid fa-money-bill mx-1"></i>Prix d'entrée:<strong
                                            class="card-text mb-auto mx-1">{{ $show->price }}
                                            &euro;</strong></p>
                                    <p>
                                        <a href="{{ route('shop.show', $show->slug) }}" class="btn btn-info mt-3">
                                            <i class="fa-solid fa-business-time mx-2"></i>Reservez</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $shows->links() }}
                </div>

            </div>
        </div>
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Prochains spectacles</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- single product -->
                    @foreach ($shows as $show)
                        @if ($show->bookable == 0)
                            <div class="col-lg-3 col-md-6">
                                <div class="single-product">
                                    <a href="{{ route('shop.show', $show->slug) }}"><img class="img-fluid"
                                            src="{{ Voyager::image($show->poster_url) }}" alt="Image du produit"></a>
                                    <div class="product-details">
                                        <a href="{{ route('shop.show', $show->slug) }}">
                                            <h6>{{ $show->title }}</h6>
                                        </a>
                                        <p>{{ $show->details }}</p>
                                        {{-- <div class="price mt-4">
                                        <h6>${{ $show->price }}</h6>
                                    </div> --}}
                                        <div class="prd-bottom">
                                            <a href="{{ route('shop.show', $show->slug) }}" class="social-info">
                                                <i class="fa-solid fa-eye"></i>
                                                <p class="hover-text">Voir plus</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- end product Area -->
@endsection
