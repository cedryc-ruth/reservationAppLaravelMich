@extends('layouts.master')
@section('content')
    <!-- Start Banner Area -->
    {{ Breadcrumbs::render('localite', $locality) }}
    <!-- End Banner Area -->

    <!--================Single Artist Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="d-flex justify-content-center mb-5">
                <a href="{{ route('locality.index') }}" class="btn btn-info">Retour à l'index</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h2>{{ $locality->locality }} {{ $locality->postal_code }}</h2>
                        <h3>Lieux de spectacle: </h3>
                        <ul class="my-2">
                            @foreach ($locality->locations as $location)
                                <li>
                                    <h4><a href="{{ route('location.show',$location->slug)}}"><i class="fa-regular fa-circle mx-2"></i>{{ $location->designation }}</a></h4>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Artist Area =================-->
@endsection
