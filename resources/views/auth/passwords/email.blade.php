@extends('layouts.master')

@section('content')
    {{ Breadcrumbs::render('forgotPassword') }}

    <!--================Login Box Area =================-->
    <section class="login_box_area section_gap">
        <div class="container">
            @if (Session::has('status'))
                <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                    <strong>{{ Session::get('status') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="{{ asset('img/login.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Réinitialiser votre mot de passe</h3>

                        <form class="row login_form" action="{{ route('password.email') }}" method="POST" id="contactForm"
                            novalidate="novalidate" method="POST">
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" placeholder="Votre e-mail" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn">Envoyez le lien</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
