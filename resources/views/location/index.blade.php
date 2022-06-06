@extends('layouts.master')

@section('content')
    <!-- Start Banner Area -->
    {{ Breadcrumbs::render('locations') }}
    <!-- End Banner Area -->

    <!-- start product Area -->

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Lieux de spectacle</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($locations as $location)
                <div class="col-md-4">
                    <div class="card h-100 text-center">
                        <img src="{{ Voyager::image($location->image) }}" alt="Image d'une salle" class="card-img-top" />
                        <div class="card-body">
                            <h5 class="card-title">Nom: {{ $location->designation }}</h5>
                            <p class="card-text">Adresse: {{ $location->address }}</p>
                            <p class="card-text"><a href="{{ $location->website }}" target="_blank"
                                    class="badge badge-secondary">{{ $location->website }}</a></p>
                            <p class="card-text">Téléphone: {{ $location->phone }}</p>
                            <p class="card-text">Commune: {{ $location->locality->postal_code }}
                                {{ $location->locality->locality }}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('location.show', $location->slug) }}" class="btn btn-info">Voir plus</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $locations->appends(request()->input())->links() }}
        </div>

    </div>

    <!-- end product Area -->
@endsection
