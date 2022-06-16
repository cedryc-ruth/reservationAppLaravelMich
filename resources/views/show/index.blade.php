@extends('layouts.master')

@section('content')
    <!-- Start Banner Area -->
    {{ Breadcrumbs::render('spectacles') }}
    <!-- End Banner Area -->

    <!-- start product Area -->

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                   <a href="{{ route('show.index') }}"><h1>Liste des spectacles</h1></a>
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
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!-- Barre de recherche -->
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="d-flex flex-wrap align-items-center">
                        <h3>Réservable: </h3>
                        <a href="{{ route('show.index', ['reservable' => '1']) }}" class="btn btn-info mx-2">Oui</a>
                        <a href="{{ route('show.index', ['reservable' => '0']) }}" class="btn btn-info">Non</a>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-4">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="d-flex">
                            <h3>Prix: </h3>
                            <a href="{{ route('show.index', ['sort' => 'asc']) }}" class="btn btn-info mx-2"><i
                                    class="fa-solid fa-arrow-up"></i></a>
                            <a href="{{ route('show.index', ['sort' => 'desc']) }}" class="btn btn-info"><i
                                    class="fa-solid fa-arrow-down"></i></a>
                            <form action="{{ route('show.searchbyprice') }}" class="d-flex align-items-center"
                                method="GET">
                                <input type="number" name="price1" class="form-control p-1 mx-2" min="5" value="5">
                                <input type="number" name="price2" class="form-control p-1" min="10" value="10">
                                <h4 class="mx-1">&euro;</h4>
                                <button type="submit" class="btn btn-info mx-1"><i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </form>

                        </div>
                    </div>

                </div>
                <div class="col-lg-5">
                    <form action="{{ route('show.searchbydate') }}" method="GET">
                        <div class="d-flex form-group mb-0">
                            <input type="date" name="date1" class="form-control mx-2"
                                value="{{ old('date1', date('Y-m-d')) }}">
                            <input type="date" name="date2" class="form-control"
                                value="{{ old('date2', date('Y-m-d')) }}">
                            <button type="submit" class="btn btn-info mx-1"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3">
                    <form action="{{ route('show.search') }}" class="d-flex mr-3 align-items-center" method="GET">
                        <div class="form-group mb-0">
                            <input type="text" class="form-control" name="search" placeholder="Recherche sur titre ...">
                        </div>
                        <button type="submit" class="btn btn-info mx-1"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
            </div>

        </div>
        {{-- <div class="row justify-content-end mb-3">
            <div class="col-lg-3">
                <form action="{{ route('show.search') }}" class="d-flex mr-3 align-items-center" method="GET">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control" name="search" placeholder="Recherche ...">
                    </div>
                    <button type="submit" class="btn btn-info mx-1"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div> --}}
        <div class="row justify-content-center">
            @foreach ($shows as $show)
                <div class="col-md-4">
                    <div class="card h-100 text-center">
                        <img src="{{ Voyager::image($show->poster_url) }}" alt="Image d'un show"
                            class="card-img-top" />
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
                                    {{-- <li><span> --}}
                                            {{-- class="{{ $representation->when < new DateTime(now()) ? 'txt-deco' : '' }}">{{ $representation->location->designation }}</span> --}}
                                    {{-- </li> --}}
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
        <div class="d-flex justify-content-center mt-5">
            {{ $shows->appends(request()->input())->links() }}
        </div>

    </div>

    <!-- end product Area -->
@endsection

@section('search-js')
    <script></script>
@endsection
