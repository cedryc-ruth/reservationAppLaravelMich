@extends('layouts.master')

@section('extra-css')
    <style>
        #show {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
        }

        #show td,
        #show th {
            border: 1px solid #ddd;
            padding: 15px;
        }

        #show th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: #fff;
        }

    </style>
@endsection

@section('content')
    <!-- Start Banner Area -->
    {{ Breadcrumbs::render('artistes_externes') }}
    <!-- End Banner Area -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Les artistes du théâtre de la Ville de Paris (via l'API)</h2>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <table class="table table-striped" id="show">
                <thead>
                    <tr>
                        <th class="text-center h4">Prénom(s)</th>
                        <th class="text-center h4">Nom(s)</th>
                        <th class="text-center h4">Rôle(s)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collection as $item)
                        <tr>
                            <td class=" h5">{{ $item['name'] }}</td>
                            <td class="h5">{{ $item['familyName'] }}</td>
                            <td class="text-center h5">{{ $item['jobTitle'] ?? ' non renseigné ' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
