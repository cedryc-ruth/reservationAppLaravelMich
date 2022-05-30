@extends('layouts.master')

@section('content')
    <!-- Start Banner Area -->
     {{ Breadcrumbs::render('artistes') }}
    <!-- End Banner Area -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Nos artistes</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($artists as $artist)
                <div class="col-md-4 my-2">
                    <div class="card gcard h-100 my-2" style="width: 18rem;">
                        <img src="{{ Voyager::image($artist->image) }}" class="card-img-top" alt="Photo artiste">
                        <div class="card-body mt-2">
                            <h5 class="card-title">{{ $artist->firstname }}</h5>
                            <p class="card-text">
                                <ul>
                                    @foreach ($artist->types as $type)
                                        <li>{{ $type->type }}</li>
                                    @endforeach
                                </ul>
                            </p>
                            <a href="{{ route('artist.show',$artist->id) }}" class="btn">En savoir plus</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $artists->links() }}
        </div>
    </div>
@endsection
