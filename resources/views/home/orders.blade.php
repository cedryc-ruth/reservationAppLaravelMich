@extends('layouts.master')
@section('content')
    <!-- Start Banner Area -->
    {{ Breadcrumbs::render('commandes') }}
    <!-- End Banner Area -->
    <div class="container my-5">
        <div class="orders">
            <h2 class="text-center">Historique de vos commandes</h2>
            @foreach ($orders as $order)
                <div class="table-responsive order_details_table">
                    <div class="d-flex justify-content-between my-5 px-5">
                        <h4>
                            <i class="fas fa-receipt"></i>
                            Commande #{{ $order->id }}
                        </h4>
                        <h4>Date: {{ $order->created_at->translatedFormat('d M Y') }}</h4>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col">Spectacle(s)</th>
                                <th class="col">Places</th>
                                <th class="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->representations as $representation)
                                <tr>
                                    <td>{{ $representation->show->title }} - (Prix: {{$representation->show->price }}&euro; -- Date du spectacle: {{ $representation->when->translatedFormat('d M Y') }})</td>
                                    <td>x {{$representation->pivot->places }}</td>
                                    <td>{{ round($representation->show->price * $representation->pivot->places,2) }}&euro;</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td><b>TVA</b></td>
                                <td></td>
                                <td>21 &euro;</td>
                            </tr>
                            <tr>
                                <td><b>TOTAL AVEC TVA</b></td>
                                <td></td>
                                <td><strong>{{ round($order->paiement_total,2) }}&euro;</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
@endsection
