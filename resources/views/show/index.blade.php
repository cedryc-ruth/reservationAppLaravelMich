@extends('layouts.master')

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Karma e-reservation</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ route('show.index') }}">Spectacles<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('show.nextindex') }}">Prochains spectacles<span
                                class="lnr lnr-arrow-right"></span></a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- start product Area -->

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Spectacles à l'affiche</h1>
                    <p>Tous les spectacles à l'affiche sont reservables</p>
                </div>
            </div>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-2 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!-- Barre de recherche -->
        <div class="row justify-content-end mb-3">
            <div class="col-lg-3">
                <form action="{{ route('show.search') }}" class="d-flex mr-3 align-items-center" method="GET">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control" name="search" placeholder="Recherche ...">
                    </div>
                    <button type="submit" class="btn btn-info mx-1"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach ($shows as $show)
                <div class="col-md-4">
                    <div class="card h-100 text-center">
                        <img src="{{ Voyager::image($show->poster_url) }}" alt="Image d'un show" class="card-img-top" />
                        <div class="card-body">
                            <h5 class="card-title">{{ $show->title }}</h5>
                            <p class="card-text">{{ $show->subtitle }}</p>
                            <p class="card-text"><i class="fa-solid fa-ticket mx-1"></i>Reservable:
                                {{ $show->bookable ? 'Oui' : 'Non' }}</p>
                            <p class="fs-2"><i class="fa-solid fa-calendar-days mx-1"></i>Date(s):
                                <br>
                                @foreach ($show->representations as $item)
                                    <span
                                        class="{{ $item->when < new DateTime(now()) ? 'txt-deco' : '' }}">{{ $item->when->translatedFormat('d/M/Y') }},
                                    </span>
                                @endforeach
                            </p>
                            <p><i class="fa-solid fa-film mx-1"></i>Salle(s) de spectacle:
                            <ul>
                                @foreach ($show->representations as $representation)
                                    <li><span
                                            class="{{ $representation->when < new DateTime(now()) ? 'txt-deco' : '' }}">{{ $representation->location->designation }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            </p>
                            <p><i class="fa-solid fa-money-bill mx-1"></i>Prix d'entrée:<strong
                                    class="card-text mb-auto mx-1">{{ $show->price }}
                                    &euro;</strong></p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('show.show', $show->slug) }}"
                                class="btn btn-info mt-3 {{ $show->bookable == 0 ? 'disabled' : '' }}">
                                <i class="fa-solid fa-business-time mx-2"></i>Reservez</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $shows->links() }}
        </div>

    </div>

    <!-- end product Area -->
@endsection

@section('search-js')
    <script></script>
@endsection
