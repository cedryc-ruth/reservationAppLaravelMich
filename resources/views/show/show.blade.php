@extends('layouts.master')
@section('content')
    <!-- Start Banner Area -->
    {{ Breadcrumbs::render('representation',$show) }}
    <!-- End Banner Area -->

    <!--================Single Product Area =================-->
    <div class="product_image_area mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h2>Spectacle</h2>
                    </div>
                </div>
            </div>
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_Product_carousel">
                        <div class="single-prd-item">
                            <img class="img-fluid" src="{{ Voyager::image($show->poster_url) }}"
                                alt="Image du spectacle">
                        </div>
                        @foreach (json_decode($show->images, true) as $image)
                            <div class="single-prd-item">
                                <img class="img-fluid" src="{{ Voyager::image($image) }}" alt="Images du spectacle">
                            </div>
                        @endforeach
                    </div>
                    <h3 class="my-4">Description du spectacle</h3>
                    <p class="h6">{{ $show->description }}</p>
                    <h3 class="my-4">Liste des artistes</h3>
                    <ul>
                        @foreach ($show->artistTypes as $collaborateur)
                            <li class="h6">{{ $collaborateur->artist->firstname }}
                                {{ $collaborateur->artist->lastname }}
                                ({{ $collaborateur->type->type }})
                            </li>
                        @endforeach
                    </ul>
                    <div class="d-flex justify-content-left my-5">
                        <a href="{{ route('show.index') }}" class="btn btn-info">Retour à l'index</a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">

                    <h3 class="mb-4">{{ $show->title }}</h3>
                    <h6 class="mb-5"><i class="fa-solid fa-wand-magic-sparkles mx-2"></i>Lieu de création et de
                        répétition:
                        {{ $show->location->designation }} </h6>

                    <h2 class="mb-5">Prix: {{ $show->price }} &euro; </h2>
                    <h6 class="mb-5"><i class="fa-solid fa-ticket mx-1"></i>Reservable:
                        {{ $show->bookable ? 'Oui' : 'Non' }}</h6>
                    <h6 class="mb-5"><i class="fa-solid fa-film mx-1"></i>Salle de représentation:
                        {{ $representation->location->designation }} </h6>
                    <h6 class="mb-5"><i class="fa-solid fa-location-dot mx-1"></i>Adresse de représentation:
                        {{ $representation->location->address }}
                        ,
                        {{ $representation->location->locality->postal_code }}
                        {{ $representation->location->locality->locality }}</h6>

                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="show_id" value="{{ $show->id }}">
                        <div class="form-group mb-5">
                            <label for="representation_id" class="form-label">
                                <h6 class=""><i class="fa-solid fa-calendar-days mx-1"></i>Choisissez une
                                    date de représentation: </h6>
                            </label>
                            <select class="form-select mb-5" id="representation_id" name="representation_id">
                                @foreach ($show->representations as $representation)
                                    @if ($representation->when >= new DateTime(now()))
                                        <option value="{{ $representation->id }}">
                                            {{ $representation->when->format('d-m-Y à H:i:s') }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group mb-5">
                            <label for="qty" class="form-label">
                                <h6 class=""><i class="fa-solid fa-chair mx-2"></i></i>Choisir
                                    le
                                    nombre de places à réserver </h6>
                            </label>
                            <select name="qty" id="qty" class="form-select mb-3">
                                @for ($i = 1; $i <= 6; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-cart-shopping mx-1"></i>Ajouter
                            au panier</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->
@endsection
