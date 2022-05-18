@extends('layouts.master')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Spectacle en details</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('spectacles') }}">Spectacles<span class="lnr lnr-arrow-right"></span></a>
                        {{-- <a href="{{ route('shop.index') }}">Réservation<span class="lnr lnr-arrow-right"></span></a> --}}
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_Product_carousel">
                        <div class="single-prd-item">
                            <img class="img-fluid" src="{{ Voyager::image($show->poster_url) }}" alt="">
                        </div>
                        @foreach (json_decode($show->images, true) as $image)
                            <div class="single-prd-item">
                                <img class="img-fluid" src="{{ Voyager::image($image) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{ $show->title }}</h3>
                        <h2 class="mb-5">{{ $show->price }} &euro; </h2>
                        <h6 class="mb-5"><i class="fa-solid fa-ticket mx-1"></i>Reservable:
                            {{ $show->bookable ? 'Oui' : 'Non' }}</h6>
                        <h6 class="mb-5"><i class="fa-solid fa-film mx-1"></i>Salle de spectacle:
                            {{ $representation->location->designation }} </h6>
                        <h6 class="mb-5"><i class="fa-solid fa-location-dot mx-1"></i>Adresse:
                            {{ $representation->location->address }}
                            ,
                            {{ $representation->location->locality->postal_code }}
                            {{ $representation->location->locality->locality }}</h6>

                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="show_id" value="{{ $show->id }}">
                            <div class="form-group mb-5">
                                <label for="representation_id" class="form-label">
                                    <h6 class=""><i class="fa-solid fa-calendar-days mx-1"></i>Choisir une
                                        date de
                                        représentation: </h6>
                                </label>
                                <select class="form-select mb-5" id="representation_id" name="representation_id">
                                    @foreach ($show->representations as $representation)
                                        <option value="{{ $representation->id }}">
                                            {{ $representation->when->format('d-m-Y à H:i:s') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary"><i
                                    class="fa-solid fa-cart-shopping mx-1"></i>Ajouter au panier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container mt-4">
            <h2 class="text-center mb-4">Description du spectacle</h2>
            <p>{{ $show->description }}</p>
        </div>
    </section>
    <!--================End Product Description Area =================-->
@endsection
