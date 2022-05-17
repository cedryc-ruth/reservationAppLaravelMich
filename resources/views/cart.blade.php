@extends('layouts.master')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Votre Panier</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('spectacles') }}">Spectacles<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('cart.index') }}">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <div class="container my-3 col-md-6">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-succès fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if ($message = Session::get('danger'))
            <div class="alert alert-danger alert-succès fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    @if (Cart::count() > 0)
        <div class="px-4 px-lg-0">
            <div class="pb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                            <!-- Shopping cart table -->
                            <div class="table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="p-2 px-3 text-uppercase">Spectacle(s) <span class="text-lowercase">(Cliquez sur</span> </div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Prix</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Reservation(s)</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Action</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $show)
                                            <tr>
                                                <th scope="row" class="border-0">
                                                    <div class="p-2">
                                                        <a href="{{ route('shop.showById', $show->id) }}"><img
                                                                src="{{ Voyager::image($show->model->poster_url) }}"
                                                                alt="image spectacle" width="70"
                                                                class="img-fluid rounded shadow-sm"></a>
                                                        <div class="ml-3 d-inline-block align-middle">
                                                            <h5 class="mb-0">
                                                                <select class="form-select" name="language_id"
                                                                    id="language_id">
                                                                    <option selected>Choisissez une date</option>
                                                                    @foreach ($shows as $showItem)
                                                                        @if ($showItem->id == $show->model->id)
                                                                            @foreach ($showItem->representations as $dateShow)
                                                                                <option value="">
                                                                                    {{ $dateShow->when->format('d-m-Y à H:i:s') }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td class="border-0 align-middle">
                                                    <strong> {{ $show->price }} &euro;</strong>
                                                </td>
                                                <td class="border-0 align-middle"><strong>1</strong></td>
                                                <td class="border-0 align-middle d-flex">
                                                    <form action="{{ route('cart.destroy', $show->rowId) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger mx-2"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                    <form action="{{ route('cart.save', $show->rowId) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning"><i
                                                                class="fa-solid fa-plus"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row py-5 p-4 bg-white rounded shadow-sm">
                        <div class="col-lg-6">

                        </div>
                        <div class="col-lg-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">
                                <h3 class="text-center">Détails de la commande</h3>
                                <div class="p-4">
                                    <ul class="list-unstyled mb-4">
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                class="text-muted">Sous-total</strong><strong>{{ Cart::subtotal() }}&euro;</strong>
                                        </li>
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                class="text-muted">TVA</strong><strong>{{ Cart::tax() }}
                                                &euro;</strong></li>
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                class="text-muted">Total</strong>
                                            <h5 class="font-weight-bold">{{ Cart::total() }}&euro;</h5>
                                        </li>
                                    </ul>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('checkout.index') }}" class="btn btn-warning mx-2"><i
                                                class="fa-solid fa-credit-card mx-1"></i>Passez à la caisse</a>
                                        <a href="{{ route('spectacles') }}" class="btn btn-info"><i
                                                class="fa-solid fa-masks-theater mx-2"></i>spectacles</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @else
            <div class="d-flex justify-content-center mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('img/elements/smiley.png') }}" class="card-img-top" alt="panier vide">
                    <div class="card-body">
                        <h2 class="card-title text-center">Panier vide!</h2>
                        <a href="{{ route('spectacles') }}" class="btn btn-primary btn-block">Reservez vos spectacles</a>
                    </div>
                </div>
            </div>
    @endif

    {{-- <div class="single-product-slider">
        <h4 class="text-center mt-3">Spectacle(s) sauvegardé(s)</h4>
        <div class="container mt-4">
            @if (Cart::instance('save')->count() > 0)
                <div class="row">
                    @foreach (Cart::instance('save')->content() as $show)
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img src="{{ Voyager::image($show->model->poster_url) }}" alt="produit sauvegardé"
                                    class="img-fluid">
                                <div class="product-details">
                                    <h6>{{ $show->model->title }}</h6>
                                    <div class="price">
                                        <h6>{{ $show->model->price }} &euro;</h6>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <form action="{{ route('save.destroy', $show->rowId) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mx-2"><i
                                                    class="fa fa-trash mx-2"></i>Effacer</button>
                                        </form>
                                        <form action="{{ route('save.store', $show->rowId) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-warning"><i
                                                    class="fa-solid fa-cart-shopping mx-2"></i>Panier</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
            @endif
        </div> --}}
    {{-- </div> --}}

    <!--================End Cart Area =================-->
@endsection
