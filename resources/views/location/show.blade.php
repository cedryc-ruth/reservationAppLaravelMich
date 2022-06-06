@extends('layouts.master')
@section('content')
    <!-- Start Banner Area -->
    {{ Breadcrumbs::render('location', $location) }}
    <!-- End Banner Area -->

    <!--================Single Artist Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="d-flex justify-content-center mb-5">
                <a href="{{ route('location.index') }}" class="btn btn-info">Retour à l'index</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h2>{{ $location->designation }}</h2>
                    </div>
                </div>
            </div>
            <div class="row s_product_inner">
                <div class="col-lg-6 my-2">

                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{ Voyager::image($location->image) }}" alt="Image de l'artiste">
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h4>Liste des spectacles joués dans ce lieu: </h4>
                        <ul class="my-3">
                            @foreach ($location->representations as $representation)
                                <li class="">
                                    <h4><a href="{{ route('show.show', $representation->show->slug) }}"><i class="fa-regular fa-circle mx-2"></i>{{ $representation->show->title }}</a></h4>
                                </li>
                            @endforeach
                        </ul>
                        <h4>Liste des spectacles répétés dans ce lieu: </h4>
                        <ul class="my-3">
                            @foreach ($location->shows as $show)
                                <li class="">
                                    <h4><a href="{{ route('show.show', $show->slug) }}"><i class="fa-regular fa-circle mx-2"></i>{{ $show->title }}</a></h4>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Artist Area =================-->

    <!--================Artist Description Area =================-->
    <section class="product_description_area">
        <div class="container mt-4">
            <h2 class="text-center mb-4">Petite histoire</h2>
            <p>{{ $location->story }}</p>
        </div>
    </section>
    <!--================End Artist Description Area =================-->
@endsection
