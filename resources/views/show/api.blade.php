@extends('layouts.master')

@section('content')
    <!-- Start Banner Area -->
    {{ Breadcrumbs::render('api') }}
    <!-- End Banner Area -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Utilisation de notre API</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Lien</th>
                            <th scope="col">Utilisation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p>Lister tous nos spectacles au format JSON: <br> <a href="{{ route('showApi.index') }}"
                                        class="btn btn-info">Voir</a> </p>
                            </td>
                            <td>
                                site/api/showApi: Ce lien liste tous nos spectacles
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Lister un spectacle particulier au format JSON: <a
                                        href="{{ route('showApi.show', 1) }}" class="btn btn-info">Voir</a> </p>
                            </td>
                            <td>
                                site/api/showApi/{id}: Au lien absolu vers notre API, il faut ajouter le numéro id du spectacle recherché.
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Chercher un spectacle particulier au format JSON: <a
                                        href="{{ route('showApi.search', 'la') }}" class="btn btn-info">Voir</a> </p>
                            </td>
                            <td>
                                 site/api/showApi/{mot-clé} : Au lien absolu vers notre API, il faut ajouter un mot-clé pour rechercher
                                 un spectacle particulier
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
