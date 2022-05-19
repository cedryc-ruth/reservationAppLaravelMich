@extends('layouts.master')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <div class="container my-4">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h3 class="text-success text-center my-5">Merci. Votre commande a été bien reçue</h3>
        <div class="d-flex justify-content-center my-5">
            <a href="{{ route('spectacles') }}" class="btn btn-info"><i class="fa-solid fa-masks-theater mx-2"></i>Des
                spectacles à l'affiche</a>
        </div>
    </div>

    <!--================Order Details Area =================-->
    <section class="order_details section_gap">
        <div class="container">
            <div class="row order_d_inner">
                <div class="col-lg-6">
                    <div class="details_item">
                        <h4>Résumé de votre commande</h4>
                        <ul class="list">
                            <li><a href="#"><span>Numéro de commande</span> : {{ $order->id }}</a></li>
                            <li><a href="#"><span>Date</span> : {{ $order->created_at->translatedFormat('d M Y') }}</a>
                            </li>
                            <li><a href="#"><span>Montant payé</span> : {{ round($order->paiement_total, 2) }} &euro;</a>
                            </li>
                            <li><a href="#"><span>Méthode de paiement</span> : Carte de crédit via Stripe</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="details_item">
                        <h4>Vos informations personnelles saisies</h4>
                        <ul class="list">
                            <li><a href="#"><span>Adresse</span> : {{ $order->paiement_address }}</a></li>
                            <li><a href="#"><span>Ville</span> : {{ $order->paiement_city }}</a></li>
                            <li><a href="#"><span>Téléphone</span> : {{ $order->paiement_phone }}</a></li>
                            <li><a href="#"><span>Postcode </span> : {{ $order->paiement_postalcode }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="order_details_table">
                <h2>Les détails de votre commande</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Spectacle(s)</th>
                                <th scope="col">Réservation(s)</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->representations as $representation)
                                <tr>
                                    <td>
                                        <p>{{ $representation->show->title }}</p>
                                    </td>
                                    <td>
                                        <h5>x {{ $representation->pivot->places }}</h5>
                                    </td>
                                    <td>
                                        <p>{{ round($representation->show->price * $representation->pivot->places, 2) }} &euro;</p>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                    <h4>Montant total payé</h4>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td>
                                    <p>{{ $order->paiement_total }} &euro;</p>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Order Details Area =================-->
@endsection
