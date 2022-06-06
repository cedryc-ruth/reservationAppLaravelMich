@extends('layouts.master')

@section('content')
    <!-- Start Banner Area -->
    {{ Breadcrumbs::render('types') }}
    <!-- End Banner Area -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Artistes par Type</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($types as $type)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h3 class="card-title text-center">{{ $type->type }}</h3>
                        <p class="card-text">
                            <ul>
                                @foreach ($type->artists as $artist)
                                    <li class="text-center"><a href="{{ route('artist.show', $artist->id) }}" class="badge badge-pill badge-info p-2 my-2">
                                            {{ $artist->firstname }} {{ $artist->lastname }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $types->links() }}
        </div>
    </div>
@endsection
