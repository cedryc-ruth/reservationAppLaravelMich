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
                    <h1>Salles</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($rooms as $room)
                <div class="col-md-4">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <h5 class="card-title">Nom de la salle: {{ $room->name }}</h5>
                            <p class="card-text">Nombre de place: {{ $room->seats }}</p>
                            <p class="card-text">Lieux de spectacle: {{ $room->location->designation }}</p>
                            <p class="card-text">Adresse: {{ $room->location->address }}
                                {{ $room->location->locality->postal_code }}
                                {{ $room->location->locality->locality }}
                            </p>
                        </div>
                        {{-- <div class="card-footer">
                            <a href="{{ route('location.show', $location->slug) }}" class="btn btn-info">Voir plus</a>
                        </div> --}}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $rooms->appends(request()->input())->links() }}
        </div>

    </div>

    <!-- end product Area -->
@endsection
