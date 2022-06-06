@extends('layouts.master')

@section('content')
    <!-- Start Banner Area -->
    {{ Breadcrumbs::render('localites') }}
    <!-- End Banner Area -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="card col-lg-8" style="width: 18rem;">
                <div class="card-header text-center">
                    <h2>Localités</h2>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($localities as $locality)
                        <a href="{{ route('locality.show',$locality->id) }}">
                            <li class="list-group-item">{{ $locality->locality }} {{ $locality->postal_code }}</li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
